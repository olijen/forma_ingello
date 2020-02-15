<?php

namespace forma\modules\transit\controllers;

use Yii;
use forma\modules\transit\records\transitproduct\TransitProduct;
use forma\modules\transit\services\NomenclatureService;
use forma\modules\transit\widgets\AddingFormView;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\Controller;

class AddingFormController extends Controller
{
    public function actionIndex()
    {
        $transitId = Yii::$app->request->get('transitId');
        return AddingFormView::widget(compact('transitId'));
    }

    public function actionAddPosition()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['success' => true, 'validation' => []];

        $transitId = Yii::$app->request->get('transitId');

        /** @var TransitProduct $model */
        $model = NomenclatureService::addPosition($transitId, Yii::$app->request->post());

        if (!$model) {
            $response['success'] = false;
        }
        if ($model && $model->hasErrors()) {
            $response['success'] = false;
            $response['validation'] = ActiveForm::validate($model);
        }
        return $response;
    }

    public function actionValidate()
    {
        if (Yii::$app->request->isAjax && $transitId = Yii::$app->request->get('transitId')) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            /** @var TransitProduct $model */
            $model = NomenclatureService::createPosition($transitId);
            $model->load(Yii::$app->request->post());

            return ActiveForm::validate($model);
        }
    }
}
