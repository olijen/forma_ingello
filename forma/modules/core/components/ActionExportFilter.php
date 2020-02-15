<?php

namespace forma\modules\core\components;

use Yii;
use yii\base\ActionFilter;
use forma\modules\core\services\ExportService;

class ActionExportFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        $bodyParams = Yii::$app->request->getBodyParams();
        $table = ExportService::formatContent($bodyParams['export_content'], $bodyParams['export_filetype']);
        $bodyParams = array_merge($bodyParams, ['export_content' => $table]);
        Yii::$app->request->setBodyParams($bodyParams);

        return parent::beforeAction($action);
    }
}
