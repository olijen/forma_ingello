<?php

namespace forma\modules\core\components;

use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\selling\records\selling\Selling;
use forma\modules\transit\records\transit\Transit;
use yii\base\Behavior;
use forma\modules\product\records\Product;

/**
 * @property NomenclatureInterface $owner
 */
class TotalSumBehavior extends Behavior
{
    public function getTotalSum()
    {
        $eurosSumTotal = 0;
        $dollarsSumTotal = 0;

        $units = $this->owner->getUnits();
        foreach ($units as $unit) {
            $sum = 0;
            if ($this->owner instanceof Purchase) {
                $sum += $this->determineSumForPurchaseUnit($unit);
            } elseif ($this->owner instanceof Transit) {
                $sum += $this->determineSumForTransitUnit($unit);
            } elseif ($this->owner instanceof Selling) {
                $sum += $this->determineSumForSellingUnit($unit);
            }

            if ($unit->product->type_id == Product::WINE_TYPE_ID) {
                $eurosSumTotal += $sum;
            } else {
                $dollarsSumTotal += $sum;
            }
        }

        $eurosSumTotal = number_format($eurosSumTotal, 2, '.', ',');
        $dollarsSumTotal = number_format($dollarsSumTotal, 2, '.', ',');

        return "€$eurosSumTotal, $$dollarsSumTotal";
    }

    protected function determineSumForPurchaseUnit($unit)
    {
        $sum = ($unit->cost) * $unit->quantity;
        $sum += $unit->tax;
        $sum += OverheadCostService::getByNomenclatureUnit($unit);
        return $sum;
    }

    protected function determineSumForTransitUnit($unit)
    {
        return OverheadCostService::getByNomenclatureUnit($unit);
    }

    protected function determineSumForSellingUnit($unit)
    {
        return $unit->cost * $unit->quantity;
    }
}
