<?php

namespace forma\modules\selling\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use forma\modules\selling\services\SellingService;

/**
 * Default controller for the `transit` module
 */
class MainController extends Controller
{
    public function actionIndex()
    {
        $searchModel = SellingService::search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionUpdate($id)
    {
        $this->redirect(Url::to(['/selling/form', 'id' => $id]));
    }

    public function actionCreateByRemains()
    {
        $selling = SellingService::createByRemains(Yii::$app->request->post());
        return $this->redirect(['/selling/form/index', 'id' => $selling->id]);
    }

    public function actionDelete($id)
    {
        SellingService::delete($id);
        $this->redirect('index');
    }
}
