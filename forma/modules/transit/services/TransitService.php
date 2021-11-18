<?php

namespace forma\modules\transit\services;

use forma\modules\transit\records\transitproduct\TransitProduct;
use forma\modules\warehouse\services\RemainsService;
use Yii;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\services\WarehouseService;
use forma\modules\transit\records\transit\TransitSearch;
use forma\modules\transit\records\transit\Transit;
use forma\modules\transit\records\transit\StateConfirm;
use forma\modules\transit\records\transit\StateDeny;
use forma\modules\transit\records\transit\StateInitial;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\transit\records\transit\TransitOverheadCost;
use forma\modules\warehouse\Module;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;

class TransitService
{
    public static function search()
    {
        return new TransitSearch();
    }

    public static function get($id = null)
    {
        return $id ? Transit::findOne($id) : self::create();
    }

    public static function create()
    {
        $transit = new Transit();
        $transit->date_create = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');

        return $transit;
    }

    public static function save($id, $post)
    {
        $model = self::get($id);

        if (!$model->isNewRecord) {
            $fromWarehouseId = $model->from_warehouse_id;
            $toWarehouseId = $model->to_warehouse_id;
        }

        $model->load($post);

        if (isset($fromWarehouseId) && isset($toWarehouseId)) {
            /** @var Module $module */
            $module = Yii::$app->getModule('warehouse');
            /** @var Warehouse $toWarehouse */
            $toWarehouse = WarehouseService::get($toWarehouseId);

            if ($model->from_warehouse_id != $fromWarehouseId) {
                $module->removeEmpty($model, $toWarehouse);
                NomenclatureService::deleteAllByTransit($model->id);
            }
            if ($model->to_warehouse_id != $toWarehouseId) {
                $module->removeEmpty($model, $toWarehouse);
                $module->createExpected($model);
            }
        }

        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }
        return $model;
    }

    public static function delete($id)
    {
        $model = self::get($id);
        $model->delete();

        return $model;
    }

    public static function confirm($id)
    {
        $model = self::get($id);
        $model->applyState(new StateConfirm);
        $model->save();

        return $model;
    }

    public static function deny($id)
    {
        $model = self::get($id);
        $model->applyState(new StateDeny);
        $model->save();

        return $model;
    }

    public static function rollback($id)
    {
        $model = self::get($id);

        /** @var Module $module */
        $module = Yii::$app->getModule('warehouse');
        $module->depreciate($model);

        $model->applyState(new StateInitial);

        if (!$model->save()) {
            var_dump($model->getErrors());
        }

        return $model;
    }

    public static function createByRemains($post)
    {
        Yii::debug($post);
        /** @var Warehouse $warehouse */
        $warehouse = WarehouseService::get($post['warehouse_id']);
        if (!$warehouse->belongsToUser()) {
            throw new ForbiddenHttpException();
        }

        $transit = self::create();

        $transit->setAttributes([
            'name' => 'Новое перемещение с ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s'),
            'from_warehouse_id' => $post['warehouse_id'],
            'to_warehouse_id' => $post['select_warehouse_id'],
        ]);
        if (!$transit->save()) {
            var_dump($transit->getErrors());
            die;
        }

        $warehouseProducts = WarehouseProduct::find()
            ->where(['warehouse_id' => $transit->from_warehouse_id])
            ->andWhere(['IN', 'id', $post['selection']])
            ->all();

        foreach ($warehouseProducts as $warehouseProduct) {
            $productQty = RemainsService::getAvailable($warehouseProduct->product_id, $transit->from_warehouse_id);
            if (!$productQty) {
                continue;
            }

            NomenclatureService::addPosition(['TransitProduct' => [
                'transit_id' => $transit->id,
                'product_id' => $warehouseProduct->product_id,
                'quantity' => $productQty,
            ]]);
        }

        return $transit->id;
    }

    public static function addOverheadCost($transitId)
    {
        $transaction = Yii::$app->db->beginTransaction();

        $overheadCost = OverheadCostService::save(null, Yii::$app->request->post());

        $transitOverheadCost = new TransitOverheadCost;
        $transitOverheadCost->transit_id = $transitId;
        $transitOverheadCost->overhead_cost_id = $overheadCost->id;
        $transitOverheadCost->save();

        $transaction->commit();
    }

    public static function deleteOverheadCost($transitOverheadCostId)
    {
        $transaction = Yii::$app->db->beginTransaction();

        return $transitOverheadCost = TransitOverheadCost::findOne($transitOverheadCostId);
        $transitId = $transitOverheadCost->transit_id;
        $overheadCostId = $transitOverheadCost->overhead_cost_id;

        $transitOverheadCost->delete();

        OverheadCostService::delete($overheadCostId);

        $transaction->commit();

        return $transitId;
    }

    public static function getCompleteCount()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Transit::find()->where(['state' => 1]),
        ]);

        return $dataProvider->getTotalCount();
    }

    // todo: /Вынести в виджет
    public static function getTotalOverheadCost(Transit $transit)
    {
        $commonOverheadCostsSum = TransitOverheadCost::find()
            ->joinWith(['overheadCost'])
            ->where(['transit_id' => $transit->id])
            ->sum('overhead_cost.sum');

        $unitsOverheadCostsSum = TransitProduct::find()
            ->joinWith(['overheadCost'])
            ->where(['transit_id' => $transit->id])
            ->sum('overhead_cost.sum');

        return $commonOverheadCostsSum + $unitsOverheadCostsSum;
    }
    // todo: /Вынести в виджет
}
