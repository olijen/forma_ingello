<?php

namespace forma\modules\hr\widgets;

use yii\base\Widget;
use forma\modules\hr\services\NomenclatureService;

class AddingFormView extends Widget
{
    public $sellingId;
    
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->sellingId) {
            return false;
        }

        $nomenclature = NomenclatureService::createPosition($this->sellingId);
        return $this->render('adding-form', compact('nomenclature'));
    }
}
