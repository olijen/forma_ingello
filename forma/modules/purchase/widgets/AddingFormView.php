<?php

namespace forma\modules\purchase\widgets;

use yii\base\Widget;
use forma\modules\purchase\services\NomenclatureService;
use forma\modules\overheadcost\services\OverheadCostService;

class AddingFormView extends Widget
{
    public $purchaseId;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->purchaseId) {
            return false;
        }

        $overheadCost = OverheadCostService::create();

        $nomenclature = NomenclatureService::createPosition($this->purchaseId);
        return $this->render('adding-form', compact('nomenclature', 'overheadCost'));
    }
}
