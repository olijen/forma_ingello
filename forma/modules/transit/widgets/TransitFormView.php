<?php

namespace forma\modules\transit\widgets;

use yii\base\Widget;

class TransitFormView extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('transit-form', ['model' => $this->model]);
    }
}
