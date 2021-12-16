<?php

namespace forma\modules\purchase\widgets;

use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\product\services\TaxRateService;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use forma\modules\purchase\records\purchase\Purchase;

class TotalSumView extends Widget
{
    public $purchase;

    public function init()
    {
        if (!$this->purchase instanceof Purchase) {
            throw new InvalidConfigException('purchase parameter is required and must be instance of Purchase.');
        }

        parent::init();
    }

    public function run()
    {
        $totalSums = $this->getTotalSums($this->purchase);
        $totalSumsStr = $this->getSumsStr($totalSums);

        $taxes = $this->getTaxes($this->purchase);
        $taxesStr = $this->getSumsStr($taxes);

        $indirectSums = $this->getIndirectSums($this->purchase);
        $indirectSumsStr = $this->getSumsStr($indirectSums);

        $overheadCosts = $this->getTotalOverheadCosts($this->purchase);
        $overheadCostsStr = $this->getSumsStr($overheadCosts);

        return $this->render('total-sum', compact(
            'totalSumsStr',
            'taxesStr',
            'indirectSumsStr',
            'overheadCostsStr'
        ));
    }

    protected function getTotalSums(Purchase $purchase)
    {
        $sums = [];
        foreach ($purchase->getUnits() as $unit) {
            $sums[$unit->currency->code] = $sums[$unit->currency->code] ?? 0;
            if ($unit->tax_rate_id == 2)
                $sums[$unit->currency->code] += $unit->cost * $unit->quantity * 0.8;
            else
                $sums[$unit->currency->code] += $unit->cost * $unit->quantity;
        }
        return $sums;
    }

    protected function getTaxes(Purchase $purchase)
    {
        $sums = [];
        //ниже код используется для того, чтобы разбить массив по налоговой сумме таким образом:
        //$array = ['UAH' => 1200, 'USD' => 300] - таким образом у нас есть налоги по
        //гривне в 1200 грн.
        //доллару в 300$
        foreach ($purchase->getUnits() as $unit) {
            $sums[$unit->currency->code] = $sums[$unit->currency->code] ?? 0;
            $sums[$unit->currency->code] += $this->getUnitTax($unit);
        }
        return $sums;
    }

    public function getUnitTax(PurchaseProduct $unit) {
        if ($unit->tax_rate_id == 2) {
            return $unit->cost*$unit->quantity * 0.2;
        }
        return 0;
    }

    protected function getIndirectSums(Purchase $purchase)
    {
        $sums = [];
        foreach ($purchase->getUnits() as $unit) {
            $sums[$unit->currency->code] = $sums[$unit->currency->code] ?? 0;
            $sums[$unit->currency->code] += $unit->cost * $unit->quantity +
                TaxRateService::getUnitTaxCost($unit);
        }
        return $sums;
    }

    protected function getTotalOverheadCosts(Purchase $purchase)
    {
        $costs = OverheadCost::find()
            ->joinWith(['purchaseOverheadCost', 'purchaseProducts'])
            ->where(['purchase_overhead_cost.purchase_id' => $purchase->id])
            ->orWhere(['purchase_product.purchase_id' => $purchase->id])
            ->all();

        $sums = [];

        foreach ($costs as $cost) {
            if($cost->currency){
                $sums[$cost->currency->code] = $sums[$cost->currency->code] ?? 0;
                $sums[$cost->currency->code] += $cost->sum;
            }
        }
        return $sums;
    }

    protected function getSumsStr(array $sums)
    {
        if (empty($sums)) {
            return $sum = number_format(0, 2, '.', ',');
        }

        $strings = [];
        foreach ($sums as $code => $sum) {
            $sum = number_format($sum, 2, '.', ',');
            $strings[] = "$sum $code";
        }
        return implode(', ', $strings);
    }
}
