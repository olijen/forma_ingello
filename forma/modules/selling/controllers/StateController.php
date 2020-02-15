<?php

namespace forma\modules\selling\controllers;

use Yii;
use yii\web\Controller;
use forma\modules\selling\services\SellingService;
use forma\modules\core\widgets\StateView;

class StateController extends Controller
{
    public function actionLead($id) {
        $model = SellingService::changeState($id, 'Lead');
        return StateView::widget(['model' => $model]);
    }

    public function actionFamiliar($id) {
        $model = SellingService::changeState($id, 'Familiar');
        return StateView::widget(['model' => $model]);
    }

    public function actionHot($id) {
        $model = SellingService::changeState($id, 'Hot');
        return StateView::widget(['model' => $model]);
    }

    public function actionMeeting($id) {
        $model = SellingService::changeState($id, 'Meeting');
        return StateView::widget(['model' => $model]);
    }

    public function actionTestissue($id) {
        $model = SellingService::changeState($id, 'TestIssue');
        return StateView::widget(['model' => $model]);
    }

    public function actionOffer($id) {
        $model = SellingService::changeState($id, 'Offer');
        return StateView::widget(['model' => $model]);
    }

    public function actionPayment($id) {
        $model = SellingService::changeState($id, 'Payment');
        return StateView::widget(['model' => $model]);
    }

    public function actionWork($id) {
        $model = SellingService::changeState($id, 'Work');
        return StateView::widget(['model' => $model]);
    }

    public function actionDone($id) {
        $model = SellingService::changeState($id, 'Done');
        return StateView::widget(['model' => $model]);
    }
}
