<?php

namespace forma\modules\warehouse\services;

use ekaragodin\bootstrap\Slider;
use forma\modules\core\components\NomenclatureUnitInterface;
use forma\modules\inventorization\records\Inventorization;
use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\product\services\TaxRateService;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use forma\modules\transit\records\transit\Transit;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\transit\records\transitproduct\TransitProduct;
use yii\helpers\ArrayHelper;
use Yii;

class WarehouseService
{
    public static function create()
    {
        return new Warehouse();
    }

    public static function get($id = null)
    {
        return $id ? Warehouse::findOne($id) : self::create();
    }

    public static function getAll()
    {
        return Warehouse::find()
            ->joinWith(['warehouseUsers'])
            ->where(['warehouse_user.user_id' => Yii::$app->user->id])
            ->all();
    }

    public static function addProduct(NomenclatureUnitInterface $unit, Warehouse $warehouse)
    {
        /** @var WarehouseProduct $product */
        $product = RemainsService::getByProductId($unit->getProductId(), $warehouse->id);

        if ($unit instanceof PurchaseProduct) {
            $product->currency_id = $unit->currency_id;
            $product->purchase_cost = $unit->cost;
        } elseif ($unit instanceof TransitProduct) {
            $productFromWarehouse = WarehouseProduct::find()
                ->where(['warehouse_id' => $unit->transit->from_warehouse_id])
                ->andWhere(['product_id' => $unit->getProductId()])
                ->one();

            if (!$product->purchase_cost) {
                $product->purchase_cost = $productFromWarehouse->purchase_cost;
            }
            if (!$product->recommended_cost) {
                $product->recommended_cost = $productFromWarehouse->recommended_cost;
            }
            if (!$product->tax) {
                $product->tax = $productFromWarehouse->tax;
            }
            if (!$product->currency_id) {
                $product->currency_id = $productFromWarehouse->currency_id;
            }
        }

        $product->product_id = $unit->getProductId();
        $product->quantity += $unit->getQuantity();

        /** Накладной расход на еденицу товара */
        $overheadCost = OverheadCostService::getByNomenclatureUnit($unit) /  $unit->getQuantity();

        if ($unit instanceof PurchaseProduct) {
            /** Сумма налога на еденицу товара */
            $taxCost = TaxRateService::getUnitTaxCost($unit) / $unit->getQuantity();

            $product->overhead_cost = $overheadCost;
            $product->tax = $taxCost;
        } elseif ($unit instanceof TransitProduct) {
            $product->overhead_cost += $overheadCost;
        }

        /**
         * Розничная цена составляет 130% от стомости закупки вместе с непрямым расходом
         * Оптовая цена составляет 120% от стомости закупки вместе с непрямым расходом
         */
        $purchaseCost = $product->purchase_cost;
        $indirectCost = $product->overhead_cost + $product->tax;

        $product->consumer_cost = ($purchaseCost + $indirectCost) * 1.3;
        $product->trade_cost = ($purchaseCost + $indirectCost) * 1.2;

        if (!$product->save()) {
            var_dump($product->getErrors());
            die;
        }

        return true;
    }

    public static function removeProduct(NomenclatureUnitInterface $unit, Warehouse $warehouse)
    {
        /** @var WarehouseProduct $unitOnWarehouse */
        //$unitOnWarehouse = RemainsService::getByProductId($unit->getProductId(), $warehouse->id);
        $unitOnWarehouse->quantity -= $unit->getQuantity();

        if (!$unitOnWarehouse->save()) {
            var_dump($unitOnWarehouse->getErrors());
            die;
        }
        return true;
    }

    public static function getReplaceProduct(TransitProduct $unit)
    {
        $warehouseFrom = Warehouse::find()->joinWith('warehouseProducts')
            ->where(['warehouse_id' => $unit->transit->from_warehouse_id])->one();
        $warehouseTo = Warehouse::find()->joinWith('warehouseProducts')
            ->where(['warehouse_id' => $unit->transit->to_warehouse_id])->one();
        $_transitProduct = Transit::find()->joinWith(['transitProducts' => function ($q) {
            $q->joinWith('overheadCost');
        }])
            ->where(['transit.id' => $unit->transit->id])->one();
        //dd($unit);
        foreach ($_transitProduct->transitProducts as $transitProduct) {
            $overheadCost = OverheadCostService::getByNomenclatureUnit($transitProduct) /  $transitProduct->quantity;
            $isFound = false;
            if ($warehouseTo != null) {
                if (count($warehouseTo->warehouseProducts) > 0) {
                    foreach ($warehouseTo->warehouseProducts as $warehouseProductTo) {
                        if ($transitProduct->product_id == $warehouseProductTo->product_id
                            && $warehouseProductTo->currency_id == $transitProduct->currency_id
                            && $overheadCost == $warehouseProductTo->overhead_cost){
                            $isFound = true;
                            $warehouseProductTo->quantity += $transitProduct->quantity;
                            $transitProduct->transit->date_complete = date('Y-m-d H:i:s');
                            if ($transitProduct->save() && $warehouseProductTo->save()) {
                                self::replaceQuantityFromWarehouseProduct($warehouseFrom, $transitProduct);
                            }
                        }
                    }
                }
            }
            if ($isFound == false) {
                $newWarehouseProduct = new WarehouseProduct();
                $overheadCost = OverheadCostService::getByNomenclatureUnit($transitProduct) /  $transitProduct->quantity;
                $purchaseCost = $transitProduct->purchase_cost;
                $indirectCost = $transitProduct->overhead_cost + $transitProduct->tax;
                $newWarehouseProduct->consumer_cost = ($purchaseCost + $indirectCost) * 1.3;
                $newWarehouseProduct->trade_cost = ($purchaseCost + $indirectCost) * 1.2;
                $newWarehouseProduct->product_id = $transitProduct->product_id;
                $newWarehouseProduct->warehouse_id = $transitProduct->transit->to_warehouse_id;
                $newWarehouseProduct->quantity = $transitProduct->quantity;
                $newWarehouseProduct->purchase_cost = $transitProduct->purchase_cost;
                $newWarehouseProduct->recommended_cost = $transitProduct->recommended_cost;
                $newWarehouseProduct->tax = $transitProduct->tax;
                $newWarehouseProduct->overhead_cost = $overheadCost;
                $newWarehouseProduct->currency_id = $transitProduct->currency_id;
                if ($newWarehouseProduct->save()) {
                    $transitProduct->transit->date_complete = date('Y-m-d H:i:s');
                    if ($transitProduct->save()) {
                        self::replaceQuantityFromWarehouseProduct($warehouseFrom, $transitProduct);
                    }
                }
            }
        }
    }

    public static  function replaceQuantityFromWarehouseProduct($warehouseFrom,$transitProduct){
        foreach ($warehouseFrom->warehouseProducts as $warehouseProductFrom) {
            if ($transitProduct->transit->from_warehouse_id == $warehouseProductFrom->warehouse_id
                && $warehouseProductFrom->product_id == $transitProduct->product_id
                && $warehouseProductFrom->currency_id == $transitProduct->currency_id
                && $warehouseProductFrom->consumer_cost == $transitProduct->consumer_cost) {
                $warehouseProductFrom->quantity -= $transitProduct->quantity;
                $warehouseProductFrom->save();
            }
        }
    }

    public static function replaceProduct(TransitProduct $unit)
    {
        self::getReplaceProduct($unit);
        return true;
    }

    public static function addExpectedProduct(NomenclatureUnitInterface $unit, Warehouse $relatedWarehouse)
    {
        /** @var WarehouseProduct $unitOnWarehouse */
        $unitOnWarehouse = RemainsService::getByProductId($unit->getProductId(), $relatedWarehouse);
        if (!$unitOnWarehouse->isNewRecord) {
            return true;
        }

        $unitOnWarehouse->warehouse_id = $relatedWarehouse->id;
        $unitOnWarehouse->product_id = $unit->getProductId();
        $unitOnWarehouse->quantity = 0;
        //$unitOnWarehouse->currency_id

        if ($unit instanceof PurchaseProduct) {
            $unitOnWarehouse->currency_id = $unit->currency_id;
        }
        Yii::debug('unitOnWarehouse');
        Yii::debug($unitOnWarehouse);
        if (!$unitOnWarehouse->save()) {
            var_dump($unitOnWarehouse->getErrors());
            die;
        }
        return true;
    }

    public static function removeEmptyProduct(NomenclatureUnitInterface $unit, Warehouse $warehouse)
    {
        /** @var WarehouseProduct $unitOnWarehouse */
        $unitOnWarehouse = RemainsService::getByProductId($unit->getProductId(), $warehouse->id);

        if ($unitOnWarehouse->isNewRecord) {
            return true;
        }
        if ($unitOnWarehouse->quantity > 0) {
            return true;
        }
        if (($unitOnWarehouse->getExpected() - $unit->getQuantity()) > 0) {
            return true;
        }

        return $unitOnWarehouse->delete();
    }

    public static function getListForInventorization($inventorizationId = null)
    {
        $list = Warehouse::find()
            ->joinWith('inventorizations')
            ->having('COUNT(inventorization.id) = 0');

        if ($inventorizationId) {
            $list->orHaving("SUM(inventorization.id = $inventorizationId) = 1");
        }

        $list->orHaving('COUNT(warehouse.id) = SUM(inventorization.state)')
            ->groupBy('warehouse.id');

        return ArrayHelper::map($list->all(), 'id','name');
    }

    public static function reviewsByInventorization($warehouseId)
    {
        return Warehouse::find()
            ->joinWith(['inventorizations'])
            ->where(['warehouse.id' => $warehouseId])
            ->andWhere(['inventorization.state' => 0])
            ->exists();
    }

    public static function reviewsByInventorizationReturnModel($warehouseId)
    {
        return Inventorization::find()
            ->where(['warehouse_id' => $warehouseId])
            ->andWhere(['inventorization.state' => 0])
            ->one();
    }
}
