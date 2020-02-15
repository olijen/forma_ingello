<?php

namespace forma\modules\selling\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use forma\modules\selling\records\selling\Selling;

class TotalSumView extends Widget
{
    public $selling;

    public function init()
    {
        if (!$this->selling instanceof Selling) {
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

    protected function getTotalSums(Selling $selling)
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
