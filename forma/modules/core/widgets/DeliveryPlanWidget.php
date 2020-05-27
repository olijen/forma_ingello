<?php


namespace forma\modules\core\widgets;


use yii\base\Widget;

class DeliveryPlanWidget extends Widget
{
    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('delivery_plan');
    }
}