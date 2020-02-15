<?php

namespace forma\modules\transit\widgets;

use forma\modules\overheadcost\records\OverheadCost;
use yii\base\Widget;
use forma\modules\transit\services\NomenclatureService;
use forma\modules\overheadcost\services\OverheadCostService;
use yii\data\ActiveDataProvider;

class NomenclatureView extends Widget
{
    public $model = null;
    public $transitId;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->transitId && !$this->model) {
            return false;
        }

        $unit = $this->getUnitModel();
        $dataProvider = NomenclatureService::getDataProvider($this->transitId);
        $overheadCost = OverheadCostService::create();

        // todo: вынести в сервис
        $transitOverheadCosts = new ActiveDataProvider([
            'sort' => false,
            'query' => OverheadCost::find()
                ->joinWith(['transitOverheadCost', 'transitOverheadCost.transit'])
                ->where(['transit_overhead_cost.transit_id' => $this->transitId])
        ]);

        return $this->render('nomenclature', compact(
            'unit',
            'dataProvider',
            'overheadCost',
            'transitOverheadCosts'
        ));
    }

    protected function  getUnitModel()
    {
        if (!$this->model || !$this->model->hasErrors()) {
            return NomenclatureService::createPosition($this->transitId);
        }
        return $this->model;
    }
}
