<?php

namespace forma\modules\product\services;

use forma\modules\product\records\PackUnit;
use forma\modules\product\records\Product;
use forma\modules\product\records\ProductPackUnit;
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

    public static function saveProductUnit($packUnitId, $productId)
    {
        \Yii::info("saveProductUnit $productId, $packUnitId");
        $ppu = new ProductPackUnit();
        $ppu->pack_unit_id = $packUnitId;
        $ppu->product_id = $productId;
        $result = $ppu->save();
        if (!$result) {
            throw new \Exception('Сохранение юнита продукта' . json_encode($ppu->getErrors()));
        }
        return $ppu->id;
    }

    public static function savePackUnit($name, $bottles_quantity = 0, $volume = 0)
    {
        \Yii::info("savePackUnit $name");
        $model = new PackUnit();
        $model->name = $name;
        $model->bottles_quantity = $bottles_quantity;
        $model->volume = $volume;

        if (!$model->save()) {
            throw new \Exception('Сохранение юнита пака ' . json_encode($model->getErrors()));
        }
        return $model->id;
    }

    public static function save($productId, $packUnitId)
    {
        \Yii::info("Product $productId, Pack $packUnitId");

        if (is_numeric($packUnitId)) {
            $model = PackUnit::find()->where(['id' => $packUnitId])->one();
            if ($model) {
                self::saveProductUnit($packUnitId, $productId);
            } else {
                $name = 'Упаковка №'. $packUnitId;
                $packUnitId = self::savePackUnit($name);
                self::saveProductUnit($packUnitId, $productId);
            }
        } else {
            $packUnitId = self::savePackUnit($packUnitId);
            self::saveProductUnit($packUnitId, $productId);
        }


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
