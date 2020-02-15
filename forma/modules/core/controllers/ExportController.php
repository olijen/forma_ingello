<?php

namespace forma\modules\core\controllers;

use kartik\grid\controllers\ExportController as KartikExportController;
use forma\modules\core\services\ExportService;

class ExportController extends KartikExportController
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => 'forma\modules\core\components\ActionExportFilter',
                'only' => ['download'],
            ]
        ]);
    }
}
