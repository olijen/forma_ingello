<?php

namespace forma\modules\hr\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use forma\modules\hr\services\InterviewService;

/**
 * Default controller for the `transit` module
 */
class MainController extends Controller
{
    public function actionIndex()
    {
        $searchModel = InterviewService::search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        Yii::debug($dataProvider);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionUpdate($id)
    {
        $this->redirect(Url::to(['/hr/form', 'id' => $id]));
    }

    public function actionCreateByRemains()
    {
        $selling = InterviewService::createByRemains(Yii::$app->request->post());
        return $this->redirect(['/hr/form/index', 'id' => $selling->id]);
    }

    public function actionDelete($id)
    {
        InterviewService::delete($id);
        $this->redirect('index');
    }
}
