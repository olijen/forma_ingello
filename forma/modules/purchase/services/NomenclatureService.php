<?php

namespace forma\modules\purchase\services;

use forma\modules\product\records\Currency;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\transit\records\transitproduct\TransitProduct;
use Yii;
use forma\modules\warehouse\Module;
use forma\modules\product\Module as ProductModule;
use forma\modules\product\records\PackUnit;
use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\product\services\TaxRateService;
use forma\modules\product\records\Product;
use forma\modules\product\services\ProductService;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use forma\modules\purchase\records\purchaseproduct\PurchaseProductSearch;
use forma\modules\overheadcost\services\OverheadCostService;
use yii\web\HttpException;
use yii\widgets\ActiveForm;

class NomenclatureService
{
    public static function addPosition($post)
    {

        $post['OverheadCost']['currency_id'] = $post['PurchaseProduct']['currency_id'];

        /** @var OverheadCost $overheadCost */
        $overheadCost = OverheadCostService::save(null, $post);

        $post['PurchaseProduct']['overhead_cost_id'] = $overheadCost->id;

        $model = self::getUnitByProduct($post);
        if (!$model->isNewRecord) {
            $addendQty = $model->quantity;
        }

        if ($model->load($post) && $model->validate() && isset($addendQty)) {
            $model->quantity = $addendQty;
        }

        if ($model->save()) {
            /** @var Module $module */
            $module = Yii::$app->getModule('warehouse');
            $module->createExpected($model->purchase);

            $model->pack_unit_id = $model->product->pack_unit_id;
            $model->save();
            Yii::debug('addPosition $model');
            Yii::debug($model);
        }

        return $model;
    }

    public static function getTaxSum(PurchaseProduct $unit)
    {
        if (!$unit->taxRate) {
            return 0;
        }
        return TaxRateService::getTaxRate($unit->tax_rate_id, $unit->cost * $unit->quantity);
    }
    
    public static function getUnit($unitId)
    {
        return PurchaseProduct::findOne($unitId);
    }

    public static function getUnitByProduct($post)
    {
        $unit = new PurchaseProduct();
        if($unit->load($post) && $unit->validate()){
            $unit->save();
        }
        return $unit;
    }

    public static function getUnitByProductId($unitId)
    {
        return PurchaseProduct::findOne($unitId);
    }

    public static function getDataProvider($purchaseId, $filter = true)
    {
        $data = $filter ? Yii::$app->request->post() : [];

        $search = new PurchaseProductSearch();
        $search->purchase_id = $purchaseId;
        
        return $search->search($data);
    }

    public static function createPosition($purchaseId)
    {
        $nomenclature = new PurchaseProduct();
        $nomenclature->purchase_id = $purchaseId;

        return $nomenclature;
    }

    public static function getByProductId($productId, $purchaseId)
    {
        $unit = PurchaseProduct::findOne([
            'product_id' => $productId,
            'purchase_id' => $purchaseId
        ]);
        return $unit ?? self::createPosition($purchaseId);
    }

    public static function addPositionByPackUnit($purchaseId, $data)
    {
        $overheadCost = OverheadCostService::save(null, $data);
        $data['PurchaseProduct']['overhead_cost_id'] = $overheadCost->id;

        $packUnitId = $data['PurchaseProduct']['packUnitId'];
        $productId = $data['PurchaseProduct']['product_id'];

        /** @var Product $product */
        $product = ProductService::getVariationByPackUnit($productId, $packUnitId);
        $data['PurchaseProduct']['product_id'] = $product->id;
        $model = self::getByProductId($data['PurchaseProduct']['product_id'], $purchaseId);

        if ($model->load($data) && $model->save()) {
            /** @var Module $module */
            $module = Yii::$app->getModule('warehouse');
            $module->createExpected($model->purchase);
        } else {
            return false;
        }

        return $model;
    }

    public static function deletePosition($id)
    {
        /**
         * @var PurchaseProduct $model
         * @var Module $module
         */
        $model = PurchaseProduct::findOne($id);
        $module = Yii::$app->getModule('warehouse');

        $module->removeEmptyUnit($model, $model->purchase->getRelatedWarehouse());
        $model->delete();

        return $model;
    }

    public static function deleteAllByPurchase($purchaseId)
    {
        return PurchaseProduct::deleteAll(['purchase_id' => $purchaseId]);
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

        $data = ['PurchaseProduct' => array_shift($post['PurchaseProduct'])];

        if (!$unit->load($data) || !$unit->save()) {
            $response['message'] = self::getErrorMessage($unit);
        }
        if ($outputAttribute) {
            $response['output'] = $unit->$outputAttribute;
        }

        return $response;
    }

    public static function changePositionOverheadCost($post)
    {
        $response = ['output' => '', 'message' => ''];

        $post = Yii::$app->request->post();
        $unitId = $post['editableKey'];

        $unit = self::getUnit($unitId);
        if (!$unit) {
            return false;
        }

        /** @var OverheadCost $overheadCost */
        $overheadCost = OverheadCostService::get($unit->overhead_cost_id);
        if (!$overheadCost) {
            return false;
        }

        if (!$overheadCost->load($post) || !$overheadCost->save()) {
            $response['message'] = self::getErrorMessage($overheadCost);
        }

        return $response;
    }

    public static function changeOverheadCost($post)
    {
        $response = ['output' => '', 'message' => ''];

        $post = Yii::$app->request->post();
        $overheadCostId = $post['editableKey'];

        /** @var OverheadCost $overheadCost */
        $overheadCost = OverheadCostService::get($overheadCostId);
        if (!$overheadCost) {
            return false;
        }

        $data = ['OverheadCost' => array_shift($post['OverheadCost'])];

        if (!$overheadCost->load($data) || !$overheadCost->save()) {
            $response['message'] = self::getErrorMessage($overheadCost);
        }

        return $response;
    }

    private static function getErrorMessage($model)
    {
        /** @var PurchaseProduct $model */
        if (!$model->hasErrors()) {
            return false;
        }
        $validation = ActiveForm::validate($model);
        return array_shift($validation);
    }

    /**
     * Changes product's variant of unit by pack.
     *
     * @param $unitId
     * @param $post
     * @return array
     * @throws HttpException
     */
    public static function changePack($unitId, $post)
    {
        $response = ['success' => true, 'output' => '', 'message' => ''];

        $packId = $post['PurchaseProduct']['pack_unit_id'] ?? false;
        if ($packId === false) {
            throw new HttpException(400, 'PurchaseProduct[pack_unit_id] parameter is required.');
        }

        $unit = static::getUnit($unitId);
        $pack = PackUnit::findOne($packId);

        static::convertByPack($unit, $pack);

        return $response;
    }

    /**
     * Converts nomenclature product by pack unit.
     *
     * @param PurchaseProduct $unit
     * @param PackUnit|null $pack
     * @return bool
     * @throws \Exception
     * @throws \Throwable
     */
    public static function convertByPack(PurchaseProduct $unit, PackUnit $pack = null)
    {
        /** @var ProductModule $module */
        $module = Yii::$app->getModule('product');

        /* @var Product $product */
        $product = $module->getByPack($unit->product, $pack);

        if ($unitIn = static::getByProduct($unit->purchase, $product)) {
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
     * @param Purchase $purchase
     * @param Product $product
     * @return PurchaseProduct|array|null
     */
    public static function getByProduct(Purchase $purchase, Product $product)
    {
        return PurchaseProduct::find()
            ->where(['purchase_id' => $purchase->id])
            ->andWhere(['product_id' => $product->id])
            ->one();
    }

    public static function changeCurrencyByPost($unitId, $post)
    {
        $response = ['success' => true, 'output' => '', 'message' => ''];

        $currencyId = $post['PurchaseProduct']['currency_id'] ?? false;
        if ($currencyId === false) {
            throw new HttpException(400, 'PurchaseProduct[currency_id] parameter is required.');
        }

        $unit = static::getUnit($unitId);
        $currency = Currency::findOne($currencyId);

        static::changeCurrency($unit, $currency);

        return $response;
    }

    public static function changeCurrency(PurchaseProduct $unit, Currency $currency)
    {
        $unit->link('currency', $currency);
        $unit->overheadCost->link('currency', $currency);
    }
}
