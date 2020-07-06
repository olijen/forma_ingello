<?php

namespace forma\modules\core\widgets;


use yii\base\Widget;

class WeeklySalesWidget extends Widget
{
    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('weekly_sales');
    }
}
