<?php

namespace forma\modules\hr\widgets;

use forma\modules\hr\records\interview\Interview;
use yii\base\InvalidConfigException;
use yii\base\Widget;


class TotalSumView extends Widget
{
    public $selling;

    public function init()
    {
        if (!$this->selling instanceof Interview) {
            throw new InvalidConfigException('selling parameter is required and must be instance of Selling.');
        }

        parent::init();
    }

    public function run()
    {
        $totalSums = $this->getTotalSums($this->selling);
        $totalSumsStr = $this->getSumsStr($totalSums);

        return $this->render('total-sum', compact(
            'totalSumsStr'
        ));
    }

    protected function getTotalSums(Interview $selling)
    {
        $sums = [];
        foreach ($selling->getUnits() as $unit) {
            $sums[$unit->currency->code] = $sums[$unit->currency->code] ?? 0;
            $sums[$unit->currency->code] += $unit->cost * $unit->quantity;
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
