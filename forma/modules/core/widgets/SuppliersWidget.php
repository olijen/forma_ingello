<?php


namespace forma\modules\core\widgets;


use yii\base\Widget;

class SuppliersWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('suppliers');
    }
}