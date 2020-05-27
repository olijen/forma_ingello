<?php

namespace forma\modules\core\widgets;


use yii\base\Widget;

class EmployeesWidget extends Widget
{
    public $directoryAsset;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('employees', ['directoryAsset' => $this->directoryAsset]);
    }
}