<?php

namespace forma\modules\inventorization\controllers;

use forma\modules\inventorization\widgets\InventorizationFormView;
use forma\modules\inventorization\services\InventorizationService;
use forma\components\Controller;
use Yii;

/**
 * Default controller for the `purchase` module
 */
class FormController extends Controller
{
    public function actionIndex($id = null)
    {
        $model = InventorizationService::get($id);
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate($warehouseId = null)
    {
        $model = InventorizationService::createByWarehouse($warehouseId);
        return $this->redirect(['/inventorization/form', 'id' => $model->id]);
    }

    public function actionSave($id)
    {
        $model = InventorizationService::save($id, Yii::$app->request->post());
        return InventorizationFormView::widget(['model' => $model]);
    }
}
