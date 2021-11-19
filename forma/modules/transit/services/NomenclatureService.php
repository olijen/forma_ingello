<?php

namespace forma\modules\transit\services;

use forma\modules\core\records\User;
use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\product\records\Currency;
use forma\modules\product\records\PackUnit;
use forma\modules\transit\records\transit\Transit;
use forma\modules\warehouse\records\WarehouseProduct;
use Yii;
use forma\modules\product\records\Product;
use forma\modules\product\services\ProductService;
use forma\modules\transit\records\transitproduct\TransitProduct;
use forma\modules\transit\records\transitproduct\TransitProductSearch;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\warehouse\Module;
use yii\web\HttpException;
use yii\widgets\ActiveForm;
use forma\modules\product\Module as ProductModule;

class NomenclatureService
{
    public static function addPosition($post)
    {

        $model = self::getUnitByProduct($post);

        /*$warehouseModule = Yii::$app->getModule('warehouse');
        $productCurrency = $warehouseModule->getProductCurrency(
            $model->transit->fromWarehouse,
            $model->product
        );*/
        //$post['OverheadCost']['currency_id'] = $productCurrency->id;

        if (!isset($post['OverheadCost'])) {
            $post['OverheadCost'] = [
                'sum' => '',
                'currency_id' => Currency::getModelByUser(
                    'forma\modules\product\records\Currency',
                    User::findOne(Yii::$app->user->id),
                    true)->id,
                'type' => '',
                'comment' => '',
            ];
        }

        /** @var OverheadCost $overheadCost */
        $overheadCost = OverheadCostService::save(null, $post);
        $post['TransitProduct']['overhead_cost_id'] = $overheadCost->id;

        if (!$model->isNewRecord) {
            $addendQty = $model->quantity;
        }

        if ($model->load($post) && $model->validate() && isset($addendQty)) {
            $model->quantity = $addendQty;
        }

        if ($model->save()) {
            /** @var Module $module */
            /*$module = Yii::$app->getModule('warehouse');
            $module->createExpected($model->transit);*/

            $model->pack_unit_id = $model->product->pack_unit_id;
            $model->save();
        }
        return $model;
    }

    public static function getUnit($unitId)
    {
        return TransitProduct::findOne($unitId);
    }

    public static function getUnitByProduct($post)
    {
        $unit = new TransitProduct();
        if ($unit->load($post) && $unit->validate()) {
            $warehouseProduct = WarehouseProduct::find()->where(
                ['warehouse_id' => $unit->transit->from_warehouse_id,
                    'product_id' => $unit->product_id,
                ])->one();
            $unit->purchase_cost = $warehouseProduct->purchase_cost;
            $unit->recommended_cost = $warehouseProduct->recommended_cost;
            $unit->consumer_cost = $warehouseProduct->consumer_cost;
            $unit->trade_cost = $warehouseProduct->trade_cost;
            $unit->tax = $warehouseProduct->tax;
            $unit->overhead_cost = $warehouseProduct->overhead_cost;
            $unit->currency_id = $warehouseProduct->currency_id;
            $unit->save();
        }
        return $unit;
    }

    public static function getDataProvider($transitId)
    {
        $search = new TransitProductSearch();
        $search->transit_id = $transitId;
        
        return $search->search(Yii::$app->request->post());
    }

    public static function createPosition($transitId, $productId = null)
    {
        $model = new TransitProduct();
        $model->transit_id = $transitId;
        $model->product_id = $productId;
        return $model;
    }

    public static function getByProductId($productId, $transitId)
    {
        $unit = TransitProduct::findOne([
            'product_id' => $productId,
            'transit_id' => $transitId
        ]);
        return $unit ?? self::createPosition($transitId, $productId);
    }

    public static function addPositionByPackUnit($transitId, $data)
    {
        $overheadCost = OverheadCostService::save(null, $data);
        $data['TransitProduct']['overhead_cost_id'] = $overheadCost->id;

        $packUnitId = $data['TransitProduct']['packUnitId'];
        $productId = $data['TransitProduct']['product_id'];

        /** @var Product $product */
        $product = ProductService::getVariationByPackUnit($productId, $packUnitId);
        $data['TransitProduct']['product_id'] = $product->id;
        $model = self::getByProductId($data['TransitProduct']['product_id'], $transitId);

        if ($model->load($data) && $model->save()) {
            /** @var Module $module */
            $module = Yii::$app->getModule('warehouse');
            $module->createExpected($model->transit);
        } else {
            return false;
        }

        return $model;
    }

    public static function deletePosition($id)
    {
        /**
         * @var TransitProduct $model
         * @var Module $module
         */
        $model = TransitProduct::findOne($id);
        $module = Yii::$app->getModule('warehouse');
        //TODO Не удаляется продукт из склада, мелкие наработки, возможно,
        // нужно будет добавить ключ перемещения в таблицу склад продукта
        /*$warehouseProduct = WarehouseProduct::find()
            ->where(['warehouse_id'=>$model->transit->to_warehouse_id,
                    'product_id'=>$model->product_id]
            )->one();*/


        $module->removeEmptyUnit($model, $model->transit->toWarehouse);
        if(!empty($model->delete())){
            return $model;
        }else{
            var_dump($model->getErrors());
            die;
        }


    }

    public static function deleteAllByTransit($transitId)
    {
        return TransitProduct::deleteAll(['transit_id' => $transitId]);
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

        $data = ['TransitProduct' => array_shift($post['TransitProduct'])];

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
        /** @var TransitProduct $model */
        if (!$model->hasErrors()) {
            return false;
        }
        $validation = ActiveForm::validate($model);
        return array_shift($validation);
    }

    // TODO: Скопирован с \forma\modules\selling\services\NomenclatureService
    public static function changePack($unitId, $post)
    {
        /* @var $productModule \forma\modules\product\Module */
        $productModule = Yii::$app->getModule('product');

        $response = ['success' => true, 'output' => '', 'message' => ''];

        $packId = $post['TransitProduct']['pack_unit_id'] ?: null;

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
            ->where(['warehouse_id' => $unit->transit->from_warehouse_id])
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
            ->andWhere(['warehouse_product.warehouse_id' => $unit->transit->from_warehouse_id])
            ->one();

        if (!$requestedVariant) {
            $requestedProduct = $productModule->getByPack($unit->product, $pack);

            $requestedVariant = new WarehouseProduct();
            $requestedVariant->setAttributes([
                'warehouse_id' => $unit->transit->from_warehouse_id,
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
            ->andWhere(['warehouse_id' => $unit->transit->from_warehouse_id])
            ->one();

        if (!$originalVariant) {
            $originalProduct = $productModule->getByPack($unit->product, null);

            $originalVariant = new WarehouseProduct();
            $originalVariant->setAttributes([
                'warehouse_id' => $unit->transit->from_warehouse_id,
                'product_id' => $originalProduct->id,
                'quantity' => 0,
                'currency_id' => 1,
            ]);
            $originalVariant->save();
        }

        $originalVariant->quantity += $remainder;
        $originalVariant->save();

        $requestedUnit = TransitProduct::find()
            ->where(['transit_id' => $unit->transit_id])
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
     * @param TransitProduct $unit
     * @param PackUnit|null $pack
     * @return bool
     * @throws \Exception
     * @throws \Throwable
     */
    public static function convertByPack(TransitProduct $unit, PackUnit $pack = null)
    {
        /** @var ProductModule $module */
        $module = Yii::$app->getModule('product');

        /* @var Product $product */
        $product = $module->getByPack($unit->product, $pack);

        if ($unitIn = static::getByProduct($unit->transit, $product)) {
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
     * @param Transit $transit
     * @param Product $product
     * @return TransitProduct|array|null
     */
    public static function getByProduct(Transit $transit, Product $product)
    {
        return TransitProduct::find()
            ->where(['transit_id' => $transit->id])
            ->andWhere(['product_id' => $product->id])
            ->one();
    }
}
