<?php

namespace forma\modules\selling\widgets;

use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\services\NomenclatureService;
use yii\base\Widget;

class NomenclatureView extends Widget
{
    public $sellingId;
    public $model;
    public $selling_token;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->sellingId && !$this->model) {
            return false;
        }

        $unit = $this->getUnitModel();
        $selling = Selling::find()->where(['selling.id'=>$this->sellingId])->joinWith('sellingProducts')
            ->one();
        $dataProvider = NomenclatureService::getDataProvider($this->sellingId);
        $selling_token = $this->selling_token;


        return $this->render('nomenclature', compact(
            'unit',
            'dataProvider', 'selling_token','selling'
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
