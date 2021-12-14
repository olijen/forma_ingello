<?php

namespace forma\modules\selling\controllers;

use forma\modules\customer\records\Customer;
use forma\modules\selling\records\state\State;
use forma\modules\selling\services\SuperSellingHasEditableService;
use Yii;
use forma\modules\selling\records\superselling\Selling;
use forma\modules\selling\records\superselling\SellingSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuperSellingController implements the CRUD actions for Selling model.
 */
class SuperSellingController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Selling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SellingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            $requestPost = Yii::$app->request->post();
            $superSellingEditableService = new SuperSellingHasEditableService();
            $superSellingEditableService
                ->setAttribute($requestPost['editableKey'], $requestPost['editableIndex'], $requestPost['editableAttribute'], $requestPost['Selling']);
            if ($superSellingEditableService->editColumn()) {
                return true;
            } else {
                return false;
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
