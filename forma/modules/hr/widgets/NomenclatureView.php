<?php

namespace forma\modules\hr\widgets;

use forma\modules\hr\services\NomenclatureService;
use yii\base\Widget;

class NomenclatureView extends Widget
{
    public $sellingId;
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->sellingId && !$this->model) {
            return false;
        }

        $unit = $this-> getUnitModel();
        $dataProvider = NomenclatureService::getDataProvider($this->sellingId);

        return $this->render('nomenclature', compact(
            'unit',
            'dataProvider'
        ));
    }

    protected function getUnitModel()
    {
        if (!$this->model || !$this->model->hasErrors()) {
            return NomenclatureService::createPosition($this->sellingId);
        }
        return $this->model;
    }
}
