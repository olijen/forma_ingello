<?php

namespace forma\modules\transit\controllers;

use Yii;
use forma\components\Controller;
use yii\helpers\Url;
use forma\modules\transit\records\transit\Transit;
use forma\modules\transit\services\TransitService;
use forma\modules\transit\widgets\TransitFormView;

class FormController extends Controller
{
    public function actionIndex($id = null)
    {
        /** @var Transit @model */
        $model = TransitService::get($id);
        return $this->render('index', compact('model'));
    }

    public function actionSave($id = null)
    {
        /** @var Transit @model */
        $model = TransitService::save($id, Yii::$app->request->post());
        if (!$id) {
            return $this->redirect(Url::to(['/transit/form', 'id' => $model->id]));
        }
        return TransitFormView::widget(compact('model'));
    }
}
