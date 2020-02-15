<?php

namespace forma\modules\product\services;

use forma\modules\product\records\TaxRate;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;

class TaxRateService
{
    public static function get($id)
    {
        return TaxRate::findOne($id);
    }

    public static function getUnitTaxCost(PurchaseProduct $unit)
    {
        $rate = self::get($unit->tax_rate_id);
        if (!$rate) {
            return 0;
        }
        return ($unit->cost * $unit->quantity) * $rate->percent / 100;
    }
}
