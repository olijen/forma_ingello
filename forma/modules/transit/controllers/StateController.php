<?php

namespace forma\modules\transit\controllers;

use Yii;
use forma\components\Controller;
use forma\modules\transit\services\TransitService;
use yii\helpers\Url;
use forma\modules\core\widgets\StateView;

class StateController extends Controller
{
    public function actionConfirm($id)
    {
        if (!Yii::$app->request->isAjax) {
            Yii::debug('sfjid');
            return Yii::$app->controller->redirect('/transit/form?id='.$id);
        }
        $model = TransitService::confirm($id);
        return StateView::widget(['model' => $model]);
    }

    public function actionDeny($id)
    {
        $model = TransitService::deny($id);
        return StateView::widget(['model' => $model]);
    }

    public function actionRollback($id)
    {
        $model = TransitService::rollback($id);
        return StateView::widget(['model' => $model]);
    }
}
