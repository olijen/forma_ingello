<?php

namespace forma\modules\inventorization\widgets;

use yii\base\Widget;
use Yii;

class RemainsTableView extends Widget
{
    public $model;

    public function run()
    {
        if (!$this->model) {
            return false;
        }

        /** @var $core \forma\modules\warehouse\Module */
        $core = Yii::$app->getModule('warehouse');
        $dataProvider = $core->getRemains($this->model->warehouse);

        return $this->render('remains-table', [
            'model' => $this->model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
