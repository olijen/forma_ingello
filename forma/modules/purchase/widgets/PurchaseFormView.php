<?php

namespace forma\modules\purchase\widgets;

use yii\base\Widget;

class PurchaseFormView extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('purchase-form', [
            'model' => $this->model,
        ]);
    }
}
