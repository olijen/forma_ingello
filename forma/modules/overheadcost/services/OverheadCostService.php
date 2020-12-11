<?php

namespace forma\modules\overheadcost\services;

use forma\modules\core\components\NomenclatureUnitInterface;
use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\product\records\Currency;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\purchase\records\purchase\PurchaseOverheadCost;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use forma\modules\transit\records\transit\Transit;
use forma\modules\transit\records\transit\TransitOverheadCost;
use forma\modules\transit\records\transitproduct\TransitProduct;
use forma\modules\warehouse\Module;
use forma\modules\warehouse\records\WarehouseProduct;

class OverheadCostService
{
    public static function create()
    {
        return new OverheadCost();
    }

    public static function get($id = null)
    {
        if (is_null($id)) {
            return self::create();
        }
        return OverheadCost::findOne($id);
    }

    public static function save($id, $post)
    {
        $model = self::get($id);
        $model->load($post);
        $model->save();
        return $model;
    }

    public static function delete($overheadCostId)
    {
        $overheadCost = self::get($overheadCostId);
        if (!$overheadCost) {
            return false;
        }
        return $overheadCost->delete();
    }

    public static function getByNomenclatureUnit(NomenclatureUnitInterface $unit)
    {
        return $unit instanceof  PurchaseProduct ? self::getByPurchaseUnitResult($unit) :
            self::getByTransitUnit($unit);
    }

    protected static function getByPurchaseUnit(PurchaseProduct $unit)
    {

        return number_format(self::getByPurchaseUnitResult($unit), 2, '.', ' ');
    }

    protected static function getByPurchaseUnitResult(PurchaseProduct $unit)
    {
        $unitOverheadCost = 0;

        if ($unit->overheadCost) {
            $unitOverheadCost += $unit->overheadCost->sum;
        }

        $purchaseProductsCount = PurchaseProduct::find()
            ->where(['purchase_id' => $unit->purchase_id])
            ->count();

        $usdMainOverheadCost = static::getMainPurchaseOverheadCostsSum($unit->purchase) / $purchaseProductsCount;
        $mainOverheadCost = $usdMainOverheadCost / $unit->currency->rate;

       return $result = $unitOverheadCost + $mainOverheadCost;
    }

    protected static function getByTransitUnit(TransitProduct $unit)
    {
        /* @var $module Module */
        $module = \Yii::$app->getModule('warehouse');

        $unitOverheadCost = 0;

        if ($unit->overheadCost) {
            $currency = $module->getProductCurrency($unit->transit->fromWarehouse, $unit->product);
            $usdUnitOverheadCost = $unit->overheadCost->sum * $unit->overheadCost->currency->rate;
            $unitOverheadCost += $usdUnitOverheadCost / $currency->rate;
        }

        $transitProductsCount = TransitProduct::find()
            ->where(['transit_id' => $unit->transit_id])
            ->count();


        $usdMainOverheadCost = static::getMainTransitOverheadCostsSum($unit->transit) / $transitProductsCount;
        $currency = $module->getProductCurrency($unit->transit->fromWarehouse, $unit->product);
        $mainOverheadCost = $usdMainOverheadCost / $currency->rate;

        return $unitOverheadCost + $mainOverheadCost;
    }

    /**
     * Returns overhead costs of purchase sum in USD.
     *
     * @param Purchase $purchase
     * @return float|int
     */
    protected static function getMainPurchaseOverheadCostsSum(Purchase $purchase)
    {
        $purchaseOverheadCosts = PurchaseOverheadCost::find()
            ->joinWith(['overheadCost'])
            ->where(['purchase_overhead_cost.purchase_id' => $purchase->id])
            ->all();

        $sum = 0;
        foreach ($purchaseOverheadCosts as $cost) {
            $sum += $cost->overheadCost->sum * $cost->overheadCost->currency->rate;
        }

        return $sum;
    }

    /**
     * Returns overhead costs of purchase sum in USD.
     *
     * @param Transit $transit
     * @return float|int
     */
    protected static function getMainTransitOverheadCostsSum(Transit $transit)
    {
        $transitOverheadCosts = TransitOverheadCost::find()
            ->joinWith(['overheadCost'])
            ->where(['transit_overhead_cost.transit_id' => $transit->id])
            ->all();

        $sum = 0;
        foreach ($transitOverheadCosts as $cost) {
            $sum += $cost->overheadCost->sum * $cost->overheadCost->currency->rate;
        }

        return $sum;
    }
}
