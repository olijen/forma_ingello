<?php

namespace forma\modules\inventorization\controllers;

use forma\modules\inventorization\services\InventorizationService;
use forma\components\Controller;
use Yii;

/**
 * Default controller for the `purchase` module
 */
class MainController extends Controller
{
    public function actionIndex()
    {
        $searchModel = InventorizationService::search();

        Yii::debug($searchModel->search(Yii::$app->request->get())->getModels());
        return $this->render('index', [
            'dataProvider' => $searchModel->search(Yii::$app->request->get()),
            'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id)
    {
        return $this->redirect(['/inventorization/form', 'id' => $id]);
    }

    public function actionDelete($id)
    {
        InventorizationService::delete($id);
        return $this->redirect(['/inventorization/main']);
    }
}
