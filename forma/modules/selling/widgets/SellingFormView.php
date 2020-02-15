<?php

namespace forma\modules\selling\widgets;

use yii\base\Widget;

class SellingFormView extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('selling-form', ['model' => $this->model]);
    }
}
