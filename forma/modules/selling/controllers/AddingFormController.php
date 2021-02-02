<?php

namespace forma\modules\selling\controllers;

use Yii;
use forma\components\Controller;
use forma\modules\selling\services\NomenclatureService;
use forma\modules\selling\widgets\AddingFormView;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use yii\web\Response;
use yii\widgets\ActiveForm;

class AddingFormController extends Controller
{
    public function actionIndex()
    {
        $sellingId = Yii::$app->request->get('sellingId');
        return AddingFormView::widget(compact('sellingId'));
    }

    public function actionAddPosition()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['success' => true, 'validation' => []];

        $sellingId = Yii::$app->request->get('sellingId');

        /** @var SellingProduct $model */
        $model = NomenclatureService::addPosition($sellingId, Yii::$app->request->post());

        if ($model->hasErrors()) {
            $response['success'] = false;
            $response['validation'] = ActiveForm::validate($model);
        }
        return $response;
    }

    public function actionValidate()
    {
        if (Yii::$app->request->isAjax && $sellingId = Yii::$app->request->get('sellingId')) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            /** @var SellingProduct $model */
            $model = NomenclatureService::createPosition($sellingId);
            $model->load(Yii::$app->request->post());

            return ActiveForm::validate($model);
        }
    }
}
