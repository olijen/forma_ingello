<?php

namespace forma\modules\purchase\controllers;

use Yii;
use forma\modules\core\widgets\StateView;
use forma\modules\purchase\services\PurchaseService;
use forma\components\Controller;

/**
 * Default controller for the `purchase` module
 */
class StateController extends Controller
{
    public function actionInitial($id)
    {

        $model = PurchaseService::initial($id);
        return StateView::widget(['model' => $model]);
    }

    public function actionConfirm($id)
    {
        if (!Yii::$app->request->isAjax) {
            Yii::debug('sfjid');
            return Yii::$app->controller->redirect('/purchase/form/index?id='.$id);
        }
        $model = PurchaseService::confirm($id);
        return StateView::widget(['model' => $model]);
    }

    public function actionRollback($id)
    {
        $model = PurchaseService::rollback($id);
        return StateView::widget(['model' => $model]);
    }

    public function actionDeny($id)
    {
        $model = PurchaseService::deny($id);
        return StateView::widget(['model' => $model]);
    }

    public function actionPayment($id)
    {
        $model = PurchaseService::payment($id);
        return StateView::widget(['model' => $model]);
    }

    public function actionDelivery($id)
    {
        $model = PurchaseService::delivery($id);
        return StateView::widget(['model' => $model]);
    }
}
