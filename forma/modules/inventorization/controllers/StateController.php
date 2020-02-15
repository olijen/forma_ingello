<?php

namespace forma\modules\inventorization\controllers;

use forma\modules\inventorization\services\InventorizationService;
use yii\web\Controller;
use Yii;
use forma\modules\core\widgets\StateView;

/**
 * Default controller for the `purchase` module
 */
class StateController extends Controller
{
    public function actionConfirm($id)
    {
        $model = InventorizationService::confirm($id, Yii::$app->request->post());
        return StateView::widget(['model' => $model]);
    }
}
