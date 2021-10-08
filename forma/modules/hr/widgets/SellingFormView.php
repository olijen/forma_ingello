<?php

namespace forma\modules\hr\widgets;

use yii\base\Widget;

class SellingFormView extends Widget
{
    public $model;
    /**
     * @var mixed
     */
    public $vacancy;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('selling-form', ['model' => $this->model, 'vacancy' => $this->vacancy]);
    }
}
