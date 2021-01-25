<?php

namespace forma\modules\transit\controllers;

use Yii;
use yii\web\Controller;
use forma\modules\transit\services\TransitService;
use yii\helpers\Url;
use forma\modules\core\widgets\StateView;

class StateController extends Controller
{
    public function actionConfirm($id)
    {

        $model = TransitService::confirm($id);
        if (!Yii::$app->request->isAjax)
            return $this->redirect('/transit/form?id='.$id);
        //return $this->redirect('/transit/form?id='.$id);
        if (Yii::$app->request->isAjax)
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
