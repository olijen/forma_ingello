<?php

namespace forma\modules\selling\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use forma\modules\selling\services\SellingService;
use forma\modules\selling\widgets\SellingFormView;

class FormController extends Controller
{
    public function actionIndex($id = null)
    {
        $model = SellingService::get($id);
        return $this->render('index', compact('model'));
    }

    public function actionSave($id = null)
    {
        $model = SellingService::save($id, Yii::$app->request->post());
        if (!$id) {
            return $this->redirect(Url::to(['/selling/form', 'id' => $model->id]));
        }
        return SellingFormView::widget(compact('model'));
    }
}
