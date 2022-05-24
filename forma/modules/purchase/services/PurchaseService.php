<?php

namespace forma\modules\purchase\services;

use forma\modules\core\records\User;
use forma\modules\product\records\Currency;
use forma\modules\product\services\TaxRateService;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use Yii;
use forma\modules\warehouse\services\WarehouseService;
use forma\modules\purchase\records\purchase\StateDelivery;
use forma\modules\purchase\records\purchase\StatePayment;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\core\components\StateActiveRecord;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\purchase\records\purchase\PurchaseSearch;
use forma\modules\purchase\records\purchase\StateConfirm;
use forma\modules\purchase\records\purchase\StateDeny;
use forma\modules\purchase\records\purchase\StateInitial;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\purchase\records\purchase\PurchaseOverheadCost;
use forma\modules\warehouse\Module;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;

class PurchaseService
{
    public static function search()
    {
        return new PurchaseSearch();
    }

    public static function get($id = null)
    {
        if (!$id) {
            return self::create();
        }
        return Purchase::find()
            ->where(['id' => $id])
            ->one();
    }

    public static function create()
    {
        $purchase = new Purchase();
        $purchase->date_create = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');

        return $purchase;
    }

    public static function save($id, $post)
    {
        $model = self::get($id);

        if (!$model->isNewRecord) {
            $warehouseId = $model->warehouse_id;
            // $supplierId = $model->supplier_id;
        }

        $model->load($post);

        if (isset($warehouseId) && isset($supplierId)) {
            /** @var Module $module */
            $module = Yii::$app->getModule('warehouse');
            /** @var Warehouse $warehouse */
            $warehouse = WarehouseService::get($warehouseId);

            /*
            if ($model->supplier_id != $supplierId) {
                $module->removeEmpty($model, $warehouse);
                NomenclatureService::deleteAllByPurchase($model->id);
            }
            */
            if ($model->warehouse_id != $warehouseId) {
                $module->removeEmpty($model, $warehouse);
                $module->createExpected($model);
            }
        }

        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }
        return $model;
    }

    public static function setState($stateName, $purchaseId) : StateActiveRecord
    {
        $stateName = 'State'.ucfirst($stateName);
        $model = self::get($purchaseId);
        $model->applyState(new $stateName());
        $model->save();
        return $model;
    }

    public static function delete($id)
    {
        $model = self::get($id);
        $model->delete();
        return $model;
    }

    public static function initial($id)
    {
        $model = self::get($id);
        $model->applyState(new StateInitial());

        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }

        return $model;
    }

    public static function confirm($id)
    {
        $model = self::get($id);
        
        $model->applyState(new StateConfirm());

        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }
        
        return $model;
    }

    public static function deny($id)
    {
        $model = self::get($id);
        $model->applyState(new StateDeny());
        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }
        return $model;
    }

    public static function payment($id)
    {
        $model = self::get($id);
        $model->applyState(new StatePayment);

        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }

        return $model;
    }

    public static function delivery($id)
    {
        $model = self::get($id);
        $model->applyState(new StateDelivery);

        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }

        return $model;
    }

    public static function rollback($id)
    {
        $model = self::get($id);

        /** @var Module $module */
        $module = Yii::$app->getModule('warehouse');
        $module->takeAwayProducts($model);

        $model->applyState(new StateInitial());

        if (!$model->save()) {
            var_dump($model->getErrors());
        }
        return $model;
    }

    public static function createByWarehouse($warehouseId)
    {
        $warehouse = Warehouse::findOne($warehouseId);

        if ($warehouse->belongsToUser()) {
            $purchase = self::create();
            $supplierId = 1;

            $purchase->setAttributes([
                'name' => 'Новая поставка с ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s'),
                'warehouse_id' => $warehouse->id,
                'supplier_id' => $supplierId,
            ]);

            if (!$purchase->save()) {
                var_dump($purchase->getErrors());
                die;
            }

            return $purchase;
        }

        throw new ForbiddenHttpException;
    }

    public static function createByRemains($post)
    {
        $purchase = self::create();

        // $supplier = WarehouseProduct::findOne($post['selection'][0])->product->supplier;

        $purchase->setAttributes([
            'name' => 'Новая поставка с  ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s'),
            'warehouse_id' => $post['warehouse_id'],
            'supplier_id' => $post['supplier_id'],
        ]);

        if (!$purchase->save()) {
            var_dump($purchase->getErrors());
            die;
        }
        
        $warehouseProducts = WarehouseProduct::find()
            ->where(['IN', 'id', $post['selection']])
            ->all();

        foreach ($warehouseProducts as $warehouseProduct) {
            /*
            if ($warehouseProduct->product->supplier_id != $supplier->id) {
                continue;
            }
            */

            NomenclatureService::addPosition(['PurchaseProduct' => [
                'purchase_id' => $purchase->id,
                'product_id' => $warehouseProduct->product_id,
                'quantity' => $warehouseProduct->quantity,
                'cost' => $warehouseProduct->purchase_cost,
                'currency_id' => Currency::getCurrenciesByUser(Yii::$app->user->identity, true)->id,
            ]]);
        }

        return $purchase;
    }

    public static function addOverheadCost($purchaseId)
    {
        $transaction = Yii::$app->db->beginTransaction();

        $overheadCost = OverheadCostService::save(null, Yii::$app->request->post());

        $purchaseOverheadCost = new PurchaseOverheadCost;
        $purchaseOverheadCost->purchase_id = $purchaseId;
        $purchaseOverheadCost->overhead_cost_id = $overheadCost->id;
        $purchaseOverheadCost->save();

        $transaction->commit();

        return true;
    }

    public static function deleteOverheadCost($purchaseOverheadCostId)
    {
        $transaction = Yii::$app->db->beginTransaction();

        $purchaseOverheadCost = PurchaseOverheadCost::findOne($purchaseOverheadCostId);
        $purchaseId = $purchaseOverheadCost->purchase_id;
        $overheadCostId = $purchaseOverheadCost->overhead_cost_id;

        $purchaseOverheadCost->delete();

        OverheadCostService::delete($overheadCostId);

        $transaction->commit();

        return $purchaseId;
    }

    public static function getCompleteCount()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Purchase::find()->where(['state' => 1]),
        ]);

        return $dataProvider->getTotalCount();
    }
}
