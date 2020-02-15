<?php

namespace forma\modules\inventorization\widgets;

use forma\modules\inventorization\services\InventorizationProductService;
use yii\base\Widget;

class InventorizationTableView extends Widget
{
    public $model;

    public function run()
    {
        if (!$this->model) {
            return false;
        }

        $dataProvider = InventorizationProductService::getDataProvider($this->model->id);

        return $this->render('inventorization-table', [
            'model' => $this->model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
