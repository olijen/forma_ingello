<?php

namespace forma\modules\inventorization\services;

use forma\modules\inventorization\records\InventorizationProduct;
use Yii;
use yii\data\ActiveDataProvider;

class InventorizationProductService
{
    public static function getDataProvider($inventorizationId)
    {
        return new ActiveDataProvider([
            'query' => InventorizationProduct::find()->where(['inventorization_id' => $inventorizationId]),
        ]);
    }

    public static function get($inventorizationId, $productId)
    {
        $condition = [
            'inventorization_id' => $inventorizationId,
            'product_id' => $productId,
        ];
        return InventorizationProduct::findOne($condition) ?: self::create($condition);
    }

    public static function create($condition)
    {
        $model = new InventorizationProduct();
        $model->load($condition, '');
        return $model;
    }

    public static function saveDifference($inventorizationId, $warehouseProductId, $rectification)
    {
        /** @var $warehouseModule \forma\modules\warehouse\Module */
        $warehouseModule = Yii::$app->getModule('warehouse');
        $warehouseProduct = $warehouseModule->getProduct($warehouseProductId);

        $record = self::get($inventorizationId, $warehouseProduct->product_id);

        $record->accounting_quantity = $warehouseProduct->quantity;
        $record->fact_quantity = $rectification['factQty'];

        if (!$record->save()) {
            var_dump($record->getErrors());
            die;
        }
        return true;
    }
}
