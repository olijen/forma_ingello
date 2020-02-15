<?php

namespace forma\modules\purchase\controllers;

use Yii;
use yii\web\Controller;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use forma\modules\purchase\services\NomenclatureService;
use forma\modules\purchase\widgets\AddingFormView;
use yii\web\Response;
use yii\widgets\ActiveForm;

class AddingFormController extends Controller
{
    public function actionIndex()
    {
        $purchaseId = Yii::$app->request->get('purchaseId');
        return AddingFormView::widget(compact('purchaseId'));
    }

    public function actionAddPosition()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['success' => true, 'validation' => []];

        $purchaseId = Yii::$app->request->get('purchaseId');

        /** @var PurchaseProduct $model */
        $model = NomenclatureService::addPosition($purchaseId, Yii::$app->request->post());

        if ($model->hasErrors()) {
            $response['success'] = false;
            $response['validation'] = ActiveForm::validate($model);
        }
        return $response;
    }

    public function actionValidate()
    {
        if (Yii::$app->request->isAjax && $purchaseId = Yii::$app->request->get('purchaseId')) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            /** @var PurchaseProduct $model */
            $model = NomenclatureService::createPosition($purchaseId);
            $model->load(Yii::$app->request->post());

            return ActiveForm::validate($model);
        }
    }
}
