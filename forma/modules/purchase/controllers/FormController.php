<?php

namespace forma\modules\purchase\controllers;

use Yii;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\purchase\widgets\PurchaseFormView;
use forma\components\Controller;

class FormController extends Controller
{
    public function actionIndex($id = null)
    {
        $model = PurchaseService::get($id);
        return $this->render('index', ['model' => $model]);
    }
    
    public function actionWidget($id = null)
    {
        $model = PurchaseService::get($id);
        return PurchaseFormView::widget(['model' => $model]);
    }

    public function actionSave($id = null)
    {
        $model = PurchaseService::save($id, Yii::$app->request->post());
        if (!$id) {
            return $this->redirect('/purchase/form/index?id='.$model->id);
        }
        return PurchaseFormView::widget(['model' => $model]);
    }
}
