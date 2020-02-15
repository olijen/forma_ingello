<?php

namespace forma\modules\transit\widgets;

use forma\modules\overheadcost\records\OverheadCost;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use forma\modules\transit\records\transit\Transit;
use Yii;

class TotalSumView extends Widget
{
    public $transit;

    public function init()
    {
        if (!$this->transit instanceof Transit) {
            throw new InvalidConfigException('transit parameter is required and must be instance of Transit.');
        }

        parent::init();
    }

    public function run()
    {
        $overheadCosts = $this->getTotalOverheadCosts($this->transit);
        $overheadCostsStr = $this->getSumsStr($overheadCosts);

        return $this->render('total-sum', compact(
            'overheadCostsStr'
        ));
    }

    protected function getTotalOverheadCosts(Transit $transit)
    {
        $costs = OverheadCost::find()
            ->joinWith(['transitOverheadCost', 'transitProducts', 'currency'])
            ->where(['transit_overhead_cost.transit_id' => $transit->id])
            ->orWhere(['transit_product.transit_id' => $transit->id])
            ->all();

        $sums = [];
        foreach ($costs as $cost) {
            $sums[$cost->currency->code] = $sums[$cost->currency->code] ?? 0;
            $sums[$cost->currency->code] += $cost->sum;
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
