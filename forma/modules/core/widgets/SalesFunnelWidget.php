<?php


namespace forma\modules\core\widgets;


use yii\base\Widget;

class SalesFunnelWidget extends Widget
{

    public $onlyChart = false;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('sales_funnel', ['onlyChart' => $this->onlyChart]);
    }
}