<?php

namespace forma\modules\product\services;

use forma\modules\product\records\Color;
use forma\modules\product\records\PackUnit;
use forma\modules\product\records\Product;
use forma\modules\product\records\ProductPackUnit;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\purchase\services\PurchaseService;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class ProductService
{
    public static function get($id = null)
    {
        if (!$id) {
            return self::create();
        }
        return Product::findOne($id);
    }

    public static function create()
    {
        return new Product();
    }

    public static function save($id, $post)
    {
//        de($post);
        $model = self::get($id);

        $model->load($post);
//de($model);
        $model->load(['color_id' => self::getColorByPost($post)], '');
        $model->sku = 'VSKR-50';
        $model->volume = '50';
        $model->country_id = '6';

        //todo: нормально обработать ошибку
        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }
//        de($model->id);
//        de($post['Product']);
//        $packUnits = $post['Product']['packUnits'];
//        if (!is_array($post['Product']['packUnits'])) {
//            return $model;
//        }
//
//        ProductPackUnit::deleteAll(['product_id' => $model->id]);
//        foreach ($packUnits as $packUnitId) {
//            PackUnitService::save($model->id, $packUnitId);
//        }

        return $model;
    }

    public static function getColorByPost($post)
    {
        if (!isset($post['product-color-source'])) {
            return null;
        }
        if (!($color = Color::findOne(['name' => $post['product-color-source']]))) {
            return null;
        }
        return $color->id;
    }

    public static function createChild($parentId, $packUnitId, $post)
    {
        $model = self::create();

        $model->load($post);
        $model->load(['color_id' => self::getColorByPost($post)], '');

        $packUnit = PackUnitService::getByPost($packUnitId);
        if (!$packUnit) {
            return false;
        }

        $model->parent_id = $parentId;
        $model->pack_unit_id = $packUnit->id;

        $model->sku .= "-$packUnit->bottles_quantity";
        $model->name .= " $packUnit->name ($packUnit->bottles_quantity pc.)";

        if (!$model->save()) {
            var_dump($model->pack_unit_id);
            die;
        }

        return $model;
    }

    public static function deleteChildren($parentId)
    {
        return Product::deleteAll(['parent_id' => $parentId]);
    }

    public static function getCount()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);

        return $dataProvider->getTotalCount();
    }

    public static function getListBySupplier($supplierId)
    {
        $products = Product::find()
            ->where(['supplier_id' => $supplierId])
            // ->andWhere(['parent_id' => null])
            ->all();

        return ArrayHelper::map($products, 'id', 'name');
    }

    public static function getListByWarehouse($warehouseId)
    {
        $products = Product::find()
            ->joinWith(['warehouseProducts'], false, 'INNER JOIN')
            ->where(['warehouse_id' => $warehouseId])
            ->andWhere(['parent_id' => null])
            ->all();

        return ArrayHelper::map($products, 'id', 'name');
    }

    public static function getPackUnitsList($productId)
    {
        $product = self::get($productId);
        return $product->getPackUnits();
    }

    public static function getByPackUnit($parentId, $packUnitId)
    {
        if (!$packUnitId) {
            return Product::findOne($parentId);
        }

        return Product::find()
            ->where(['parent_id' => $parentId])
            ->andWhere(['pack_unit_id' => $packUnitId])
            ->one();
    }

    public static function getProductVariations($productId)
    {
        $product = self::get($productId);
        if (!$product) {
            return false;
        }

        if (!$product->parent_id) {
            $variations = Product::findAll(['parent_id' => $product->id]);
        } else {
            $variations = Product::find()
                ->where(['parent_id' => $product->parent_id])
                ->orWhere(['id' => $product->parent_id])
                ->andWhere(['<>', 'id', $product->id])
                ->all();
        }

        return $variations;
    }

    public static function getVariationByPackUnit($productId, $packUnitId)
    {
        $product = self::get($productId);
        $packUnitId = $packUnitId ? $packUnitId : null;

        if (!$product->isNewRecord && $product->pack_unit_id == $packUnitId) {
            return $product;
        }
        if (!$product->parent_id) {
            return $product->isNewRecord ?
                false : Product::findOne(['pack_unit_id' => $packUnitId, 'parent_id' => $product->id]);
        }

        return Product::find()
            ->where(['pack_unit_id' => $packUnitId, 'parent_id' => $product->parent_id])
            ->orWhere(['pack_unit_id' => $packUnitId, 'id' => $product->parent_id])
            ->one();
    }

    public static function searchForPurchase(Purchase $purchase, $q)
    {
        $results = [];

        $q = addslashes($q);

        $products = Product::find()
            ->where(['supplier_id' => $purchase->supplier_id])
            ->andWhere(['OR', ['LIKE', 'product.name', $q], ['LIKE', 'product.sku', $q]])
            ->all();

        foreach($products as $product) {
            $results[] = [
                'id' => $product['id'],
                'text' => $product['name'] . ' (' . $product['sku'] . ')',
            ];
        }
        return $results;
    }

    public static function search($q)
    {
        $results = [];

        $q = addslashes($q);

        $products = Product::find()
            ->where(['OR', ['LIKE', 'product.name', $q], ['LIKE', 'product.sku', $q]])
            ->all();

        foreach($products as $product) {
            $results[] = [
                'id' => $product['id'],
                'text' => $product['name'] . ' (' . $product['sku'] . ')',
            ];
        }
        return $results;
    }

    /**
     * Returns original product by itself or its variant.
     *
     * @param Product $product
     * @return Product
     */
    public static function getParent(Product $product)
    {
        return $product->parent ?? $product;
    }

    /**
     * Return array of available product's packs units for drop down list.
     *
     * @param Product $parent
     * @return array
     */
    public static function getPacksList(Product $parent)
    {
        $query = PackUnit::find()
            ->joinWith(['products'])
            ->where(['product.parent_id' => $parent->id]);

        return ArrayHelper::map($query->all(), 'id', 'name');
    }
}
