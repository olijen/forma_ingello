<?php

namespace forma\modules\selling\services;

use forma\modules\product\records\Currency;
use forma\modules\product\records\PackUnit;
use forma\modules\warehouse\Module;
use Yii;
use forma\modules\product\records\Product;
use forma\modules\product\services\ProductService;
use forma\modules\selling\records\selling\Selling;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use forma\modules\selling\records\sellingproduct\SellingProductSearch;
use yii\web\HttpException;
use yii\widgets\ActiveForm;
use forma\modules\product\Module as ProductModule;

class NomenclatureService
{
    public static function addPosition($post)
    {

        $model = self::getUnitByProduct($post);

        Yii::debug($model);

        if (!$model->isNewRecord) {
            $addendQty = $model->quantity;
        }

        if ($model->load($post) && $model->validate() && isset($addendQty)) {
            $model->quantity += $addendQty;
        }
        if(isset($post['purchase-cost'])){
            $model->purchase_cost = $post['purchase-cost'];
        }
        $model->pack_unit_id = $model->product->pack_unit_id ?? null;

        if (!$model->save()) {
            Yii::debug($model->errors);
            exit();
        }

        return $model;
    }

    public static function getUnit($unitId)
    {
        return SellingProduct::findOne($unitId);
    }

    public static function getUnitByProduct($post)
    {
        Yii::debug('getUnitByProduct');
        $sellingId = $post['SellingProduct']['selling_id'];
        $productId = $post['SellingProduct']['product_id'];

        $unit = SellingProduct::findOne([
            'selling_id' => $sellingId,
            'product_id' => $productId,
        ]);
        Yii::debug($unit);
        return $unit ?? self::createPosition($sellingId);
    }

    public static function getDataProvider($sellingId)
    {
        $search = new SellingProductSearch;
        $search->selling_id = $sellingId;

        return $search->search(Yii::$app->request->post());
    }

    public static function createPosition($sellingId = null)
    {
        $model = new SellingProduct;
        $model->selling_id = $sellingId;
        Yii::debug('createPosition');
        Yii::debug($model);
        return $model;
    }

    public static function deletePosition($id)
    {
        $model = SellingProduct::findOne($id);
        $model->delete();
        return $model;
    }

    public static function getByProductId($productId, $sellingId)
    {
        $unit = SellingProduct::findOne([
            'product_id' => $productId,
            'selling_id' => $sellingId
        ]);
        return $unit ?? self::createPosition($sellingId);
    }

    public static function addPositionByPackUnit($sellingId, $data)
    {
        if (!isset($data['SellingProduct']['packUnitId'])) {
            $data['SellingProduct']['packUnitId'] = null;
        }

        $packUnitId = $data['SellingProduct']['packUnitId'];

        $productId = $data['SellingProduct']['product_id'];

        /** @var Product $product */
        $product = ProductService::getVariationByPackUnit($productId, $packUnitId);
        $data['SellingProduct']['product_id'] = $product->id;

        $model = self::getByProductId($data['SellingProduct']['product_id'], $sellingId);
        if (!$model->load($data) || !$model->save()) {
            var_dump($model->getErrors());
            die;
        }
        return $model;
    }
    
    public static function getProductCost($productId, $sellingId, $costType)
    {
        $warehouseId = Selling::findOne($sellingId)->warehouse_id;
        $costField = +$costType === 0 ? 'consumer_cost' : 'trade_cost';
        $productOnWarehouse = WarehouseProduct::findOne(['product_id' => $productId, 'warehouse_id' => $warehouseId]);

        return $productOnWarehouse->$costField;
    }

    public static function deleteAllBySelling($sellingId)
    {
        if($sellingId){
            return SellingProduct::deleteAll(['IN', 'selling_id',  $sellingId]);
        }

    }

    public static function changeCell($post, $outputAttribute = false)
    {
        $response = ['output' => '', 'message' => ''];

        $post = Yii::$app->request->post();
        $unitId = $post['editableKey'];

        $unit = self::getUnit($unitId);
        if (!$unit) {
            return false;
        }

        $data = ['SellingProduct' => array_shift($post['SellingProduct'])];

        if (!$unit->load($data) || !$unit->save()) {
            $response['message'] = self::getErrorMessage($unit);
        }
        if ($outputAttribute) {
            $response['output'] = $unit->$outputAttribute;
        }

        return $response;
    }

    private static function getErrorMessage($model)
    {
        /** @var SellingProduct $model */
        if (!$model->hasErrors()) {
            return false;
        }
        $validation = ActiveForm::validate($model);
        return array_shift($validation);
    }


    public static function changePack($unitId, $post)
    {
        /* @var $productModule \forma\modules\product\Module */
        $productModule = Yii::$app->getModule('product');

        $response = ['success' => true, 'output' => '', 'message' => ''];

        $packId = $post['SellingProduct']['pack_unit_id'] ?: null;

        $unit = static::getUnit($unitId);
        $pack = PackUnit::findOne($packId);

        $minConvertedQty = ($pack->bottles_quantity ?? 1)
            / ($unit->packUnit->bottles_quantity ?? 1);

        if ($unit->quantity < $minConvertedQty) {
            $response['success'] = false;
            $response['message'] = "Минимальное количество для конвертации - $minConvertedQty";
            return $response;
        }

        $convertedQty = $unit->quantity
            * ($unit->packUnit->bottles_quantity ?? 1)
            / ($pack->bottles_quantity ?? 1);

        $equalConvertedQty = (int)$convertedQty;

        $remainder = ($unit->quantity * ($unit->packUnit->bottles_quantity ?? 1))
            % ($pack->bottles_quantity ?? 1);

        $currentVariant = WarehouseProduct::find()
            ->where(['warehouse_id' => $unit->selling->warehouse_id])
            ->andWhere(['product_id' => $unit->product_id])
            ->one();

        $currentVariant->quantity -= $unit->quantity;
        $currentVariant->save();

        $requestedVariant = WarehouseProduct::find()
            ->joinWith(['product'], true, 'INNER JOIN')
            ->where([
                'OR',
                'product.id' => $unit->product_id,
                'product.parent_id' => $unit->product_id
            ])
            ->andWhere(['product.pack_unit_id' => $packId])
            ->andWhere(['warehouse_product.warehouse_id' => $unit->selling->warehouse_id])
            ->one();

        if (!$requestedVariant) {
            $requestedProduct = $productModule->getByPack($unit->product, $pack);

            $requestedVariant = new WarehouseProduct();
            $requestedVariant->setAttributes([
                'warehouse_id' => $unit->selling->warehouse_id,
                'product_id' => $requestedProduct->id,
                'quantity' => 0,
                'currency_id' => 1,
            ]);
            $requestedVariant->save();
        }

        $requestedVariant->quantity += $equalConvertedQty;
        $requestedVariant->save();

        $originalVariant = WarehouseProduct::find()
            ->joinWith(['product'], true, 'INNER JOIN')
            ->where(['product.id' => $unit->product->getOriginal()->id])
            ->andWhere(['warehouse_id' => $unit->selling->warehouse_id])
            ->one();

        if (!$originalVariant) {
            $originalProduct = $productModule->getByPack($unit->product, null);

            $originalVariant = new WarehouseProduct();
            $originalVariant->setAttributes([
                'warehouse_id' => $unit->selling->warehouse_id,
                'product_id' => $originalProduct->id,
                'quantity' => 0,
                'currency_id' => 1,
            ]);
            $originalVariant->save();
        }

        $originalVariant->quantity += $remainder;
        $originalVariant->save();

        $requestedUnit = SellingProduct::find()
            ->where(['selling_id' => $unit->selling_id])
            ->andWhere(['product_id' => $requestedVariant->product_id])
            ->one();

        if ($requestedUnit) {
            $requestedUnit->quantity += $equalConvertedQty;
            $requestedUnit->save();
            $unit->delete();

            return $response;
        }

        if ($unit->packUnit && !$pack) {
            $unit->unlink('packUnit', $unit->packUnit);
        } else {
            $unit->link('packUnit', $pack);
        }
        $unit->link('product', $requestedVariant->product);
        $unit->quantity = $equalConvertedQty;
        $unit->save();

        return $response;
    }

    /**
     * Converts nomenclature product by pack unit.
     *
     * @param SellingProduct $unit
     * @param PackUnit|null $pack
     * @return bool
     * @throws \Exception
     * @throws \Throwable
     */
    public static function convertByPack(SellingProduct $unit, PackUnit $pack = null)
    {
        /** @var ProductModule $module */
        $module = Yii::$app->getModule('product');

        /* @var Product $product */
        $product = $module->getByPack($unit->product, $pack);

        $bottlesUnitQty = $unit->packUnit ?
            $unit->quantity : $unit->quantity * $unit->packUnit->bottles_quantity;

        $newUnitQty = $pack ?
            ($bottlesUnitQty / $pack->bottles_quantity) : $bottlesUnitQty;

        if ($unitIn = static::getByProduct($unit->selling, $product)) {
            $unitIn->quantity += $unit->quantity;
            return $unitIn->save() && $unit->delete();
        }

        if (!$pack && $unit->packUnit) {
            $unit->unlink('packUnit', $unit->packUnit);
        } else {
            $unit->link('packUnit', $pack);
        }

        $unit->link('product', $product);

        return true;
    }

    /**
     * Returns unit record by product.
     *
     * @param Selling $selling
     * @param Product $product
     * @return SellingProduct|array|null
     */
    public static function getByProduct(Selling $selling, Product $product)
    {
        return SellingProduct::find()
            ->where(['selling_id' => $selling->id])
            ->andWhere(['product_id' => $product->id])
            ->one();
    }

    public static function changeCurrencyByPost($unitId, $post)
    {
        $response = ['success' => true, 'output' => '', 'message' => ''];

        $currencyId = $post['SellingProduct']['currency_id'] ?? false;
        if ($currencyId === false) {
            throw new HttpException(400, 'SellingProduct[currency_id] parameter is required.');
        }

        $unit = static::getUnit($unitId);
        $currency = Currency::findOne($currencyId);

        static::changeCurrency($unit, $currency);

        return $response;
    }

    public static function changeCurrency(SellingProduct $unit, Currency $currency)
    {
        $unit->link('currency', $currency);
    }
}
