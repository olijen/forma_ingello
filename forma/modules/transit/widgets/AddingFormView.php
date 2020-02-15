<?php

namespace forma\modules\transit\widgets;

use yii\base\Widget;
use forma\modules\transit\services\NomenclatureService;
use forma\modules\overheadcost\services\OverheadCostService;

class AddingFormView extends Widget
{
    public $transitId;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->transitId) {
            return false;
        }

        $overheadCost = OverheadCostService::create();

        $nomenclature = NomenclatureService::createPosition($this->transitId);
        return $this->render('adding-form', compact('nomenclature', 'overheadCost'));
    }
}
