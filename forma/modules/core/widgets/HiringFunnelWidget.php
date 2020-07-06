<?php


namespace forma\modules\core\widgets;
use yii\base\Widget;

class HiringFunnelWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('hiring_funnel');
    }
}