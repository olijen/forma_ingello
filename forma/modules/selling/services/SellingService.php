<?php

namespace forma\modules\selling\services;

use forma\modules\customer\records\Customer;
use forma\modules\selling\forms\SalesProgress;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\selling\SellingSearch;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\warehouse\services\RemainsService;
use forma\modules\warehouse\services\WarehouseService;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;
use Yii;

class SellingService
{
    public static function search()
    {
        return new SellingSearch;
    }

    public static function get($id = null)
    {
        return $id ? Selling::findOne($id) : self::create();
    }

    public static function create()
    {
        $selling = new Selling();
        $selling->date_create = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');
        return $selling;
    }

    public static function save($id, $post)
    {
        $model = self::get($id);
        $model->selling_token = Yii::$app->getSecurity()->generateRandomString();

        if (!$model->isNewRecord) {
            $warehouseId = $model->warehouse_id;
        }

        $model->load($post);
        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }

        if (isset($warehouseId) && $model->warehouse_id != $warehouseId) {
            NomenclatureService::deleteAllBySelling($model->id);
        }

        return $model;
    }

    public static function delete($id)
    {
        $model = self::get($id);
        $model->delete();

        return $model;
    }


    public static function getCompleteCount()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Selling::find(),
        ]);

        return $dataProvider->getTotalCount();
    }

//    public static function changeState($id, $state)
//    {
//        $model = self::get($id);
//        $stateClass = 'forma\modules\selling\records\selling\State'.ucfirst($state);
//        $model->applyState(new $stateClass);
//        $model->save();
//        return $model;
//    }

    public static function createByRemains($post)
    {
        /** @var Warehouse $warehouse */
        $warehouse = WarehouseService::get($post['warehouse_id']);
        if (!$warehouse->belongsToUser()) {
            throw new ForbiddenHttpException();
        }

        $selling = self::create();
        $customer = Customer::findOne(1);

        $selling->setAttributes([
            'name' => 'Новая продажа с ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s'),
            'warehouse_id' => $warehouse->id,
            'customer_id' => $customer->id,
        ]);
        if (!$selling->save()) {
            var_dump($selling->getErrors());
            die;
        }


        $warehouseProducts = WarehouseProduct::find()
            ->where(['warehouse_id' => $warehouse->id])
            ->andWhere(['IN', 'id', $post['selection']])
            ->all();

        foreach ($warehouseProducts as $warehouseProduct) {
            $productQty = RemainsService::getAvailable($warehouseProduct->product_id, $warehouse->id);
            if (!$productQty) {
                continue;
            }

            NomenclatureService::addPosition(['SellingProduct' => [
                'selling_id' => $selling->id,
                'product_id' => $warehouseProduct->product_id,
                'quantity' => $productQty,
                'cost' => $warehouseProduct->recommended_cost,
                'cost_type' => 0,
            ]]);
        }

        return $selling;
    }




    // todo: Вынести в виджет
    public static function getTotalSum(Selling $selling)
    {
        $sum = 0;
        foreach ($selling->getUnits() as $unit) {
            $sum += $unit->cost * $unit->quantity;
        }
        return $sum;
    }

    public static function getSellingProgress()
    {
        
        $sellingProgress = new SalesProgress();
        return $sellingProgress;
    }
    // todo: Вынести в виджет
}
