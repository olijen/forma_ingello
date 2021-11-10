<?php

namespace forma\modules\warehouse\services;

use forma\modules\inventorization\records\InventorizationProduct;
use forma\modules\product\records\Currency;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;
use yii\data\ActiveDataProvider;

class RemainsService
{
    public static function get($id)
    {
        return WarehouseProduct::findOne($id);
    }

    public static function getByWarehouse(Warehouse $warehouse)
    {
        return new ActiveDataProvider([
            'query' => WarehouseProduct::find()->where(['warehouse_id' => $warehouse->id]),
        ]);
    }

    /**
     * @param $productId
     * @param $warehouseId
     * @return WarehouseProduct|null|static
     */
    public static function getByProductId($productId, $warehouseId)
    {
        return self::create($productId, $warehouseId);
    }

    public static function create($productId = null, $warehouseId)
    {
        $unit = new WarehouseProduct();
        $unit->product_id = $productId;
        $unit->warehouse_id = $warehouseId;
        $unit->currency_id = $_POST['OverheadCost']['currency_id'] ?? 1;
        return $unit;
    }

    public static function searchByWarehouse($warehouseId, $q)
    {
        $results = [];

        $q = addslashes($q);

        $warehouseProducts = WarehouseProduct::find()
            ->joinWith(['product'])
            ->where(['warehouse_product.warehouse_id' => $warehouseId]);

        if (strlen($q) > 0)
            $warehouseProducts->andWhere(['OR', ['LIKE', 'product.name', $q], ['LIKE', 'product.sku', $q]]);

        $warehouseProducts = $warehouseProducts->all();
        \Yii::debug($warehouseProducts);

        foreach ($warehouseProducts as $warehouseProduct) {
            $productQty = self::getAvailable($warehouseProduct->product_id, $warehouseId);
            if ($productQty < 1) {
                continue;
            }

            $results[] = [
                'id' => $warehouseProduct->product_id,
                'text' => $warehouseProduct->product->name . ' (' . $warehouseProduct->product->sku . ')' .
                    " Ц.З."  . $warehouseProduct->purchase_cost . ' ' . $warehouseProduct->currency->code. " Осталось" . ' ' . ($warehouseProduct->quantity -
                     $warehouseProduct->getReserved())  . ' шт'
            ];
        }
        return $results;
    }

    public static function getAvailable($productId, $warehouseId)
    {
        $unit = self::getWarehouseProduct($productId, $warehouseId);
        if (!$unit) {
            return false;
        }
        return $unit['quantity'] - $unit->getReserved();
    }

    public static function getCurrencyName($productId, $warehouseId)
    {
        $unit = self::getWarehouseProduct($productId, $warehouseId);
        if (!$unit) {
            return false;
        }

        return $unit->currency->name;
    }
    public static function getCurrencyId($productId, $warehouseId)
    {
        $unit = self::getWarehouseProduct($productId, $warehouseId);
        if (!$unit) {
            return false;
        }

        return $unit->currency_id;
    }

    public static function getWarehouseProduct($productId, $warehouseId)
    {
        return WarehouseProduct::findOne(['product_id' => $productId, 'warehouse_id' => $warehouseId]);
    }

    public static function recalculate(Warehouse $warehouse, InventorizationProduct $product)
    {
        $productOnWarehouse = self::getByProductId($product->product_id, $warehouse->id);
        $productOnWarehouse->quantity = $product->fact_quantity;

        if (!$productOnWarehouse->save()) {
            var_dump($productOnWarehouse->getErrors());
            die;
        }
        return true;
    }
}
