<?php

namespace forma\modules\inventorization\widgets;

use yii\base\Widget;

class InventorizationFormView extends Widget
{
    public $model;

    public function run()
    {
        return $this->render('inventorization-form', ['model' => $this->model]);
    }
}
