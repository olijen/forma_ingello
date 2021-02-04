<?php

namespace forma\modules\purchase\widgets;

use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\purchase\services\NomenclatureService;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class NomenclatureView extends Widget
{
    public $purchaseId;
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->purchaseId && !$this->model) {
            return false;
        }

        $unit = $this-> getUnitModel();
        $dataProvider = NomenclatureService::getDataProvider($this->purchaseId);
        $overheadCost = OverheadCostService::create();

        // todo: вынести в сервис



        $purchaseOverheadCosts = new ActiveDataProvider([
            'sort' => false,
            'query' => OverheadCost::find()
                ->joinWith(['purchaseOverheadCost', 'purchaseOverheadCost.purchase'])
                ->where(['purchase_overhead_cost.purchase_id' => $this->purchaseId])
        ]);

        $purchaseOverheadCosts->getModels();

        return $this->render('nomenclature', compact(
            'unit',
            'dataProvider',
            'overheadCost',
            'purchaseOverheadCosts'
        ));
    }

    protected function  getUnitModel()
    {
        if (!$this->model || !$this->model->hasErrors()) {
            return NomenclatureService::createPosition($this->purchaseId);
        }
        return $this->model;
    }
}
