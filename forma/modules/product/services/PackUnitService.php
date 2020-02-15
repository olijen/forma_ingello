<?php

namespace forma\modules\product\services;

use forma\modules\product\records\PackUnit;
use forma\modules\product\records\Product;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class PackUnitService
{
    public static function get($id)
    {
        if (!$id) {
            return self::create();
        }
        return PackUnit::findOne($id);
    }

    public static function create()
    {
        return new PackUnit();
    }

    public function save($id, $data)
    {
        $model;

    }

    public static function getByPost($selected)
    {
        if (is_integer(+$selected) && $packUnit = self::get($selected)) {
            return $packUnit;
        } elseif (strpos($selected, '/') !== false) {
            $packUnit = self::create();

            $selectedParts = explode('/', $selected);
            $packUnit->name = $selectedParts[0];
            $packUnit->bottles_quantity = $selectedParts[1];

            if (!$packUnit->save()) {
                return false;
            }

            return $packUnit;
        }

        return false;
    }

    public static function getAllByProduct($productId, $warehouseId = null)
    {
        $originalProduct = Product::findOne($productId)->getOriginal();

        /** @var Query $query */
        $query = (new Query())
            ->select(['pack_unit_id' => 'pack_unit.id', 'pack_unit.name', 'pack_unit.bottles_quantity', 'product_id' => 'product.id'])
            ->from('pack_unit')
            ->innerJoin('product', 'product.pack_unit_id = pack_unit.id');

        if ($warehouseId) {
            $query = $query
                ->innerJoin('warehouse_product', 'warehouse_product.product_id = product.id');
        }

        $query = $query
            ->where(['OR', "product.id = {$originalProduct->id}", "product.parent_id = {$originalProduct->id}"]);

        if ($warehouseId) {
            $query = $query
                ->andWhere(['warehouse_product.warehouse_id' => $warehouseId]);
        }

        return $query->all();
    }
}
