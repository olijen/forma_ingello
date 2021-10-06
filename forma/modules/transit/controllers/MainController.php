<?php

namespace forma\modules\transit\controllers;

use Yii;
use forma\modules\transit\records\transit\Transit;
use yii\helpers\Url;
use forma\components\Controller;
use forma\modules\transit\services\TransitService;

/**
 * Default controller for the `transit` module
 */
class MainController extends Controller
{
    public function actionIndex()
    {
        $searchModel = TransitService::search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionUpdate($id)
    {
        $this->redirect(Url::to(['/transit/form', 'id' => $id]));
    }

    public function actionDelete($id)
    {
        /** @var Transit $model */
        if (!$model = TransitService::delete($id)) {
            var_dump($model->getErrors());
            die;
        }
        return $this->redirect('index');
    }

    public function actionCreateByRemains()
    {
        $transitId = TransitService::createByRemains(Yii::$app->request->post());
        $warehouse_id = (Yii::$app->request->post('select_warehouse_id'));
        return $this->redirect('/transit/form/index?id=' . $transitId.'&warehouse_id='.$warehouse_id);
    }
}
