<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\requeststrategy\RequestStrategy;
use forma\modules\selling\records\talk\Answer;
use Yii;
use forma\modules\selling\records\talk\Request;
use forma\modules\selling\records\talk\RequestSearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Request records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Request model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Request();
        $request_strategy = new RequestStrategy();

        $strategy_id = isset($_GET['strategyId']) ?? null;
        $isSelling = isset($_GET['isSelling']) ?? null;
        $model->is_manager = isset($_GET['isManager']) ?? null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $request_strategy->strategy_id = $strategy_id;
            $request_strategy->request_id = $model->id;
            $request_strategy->save();

            return $this->redirect(['/selling/speech-module/', 'isSelling' => $isSelling]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $isSelling = isset($_GET['isSelling']) ?? null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/selling/speech-module/', 'isSelling' => $isSelling]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $isSelling = isset($_GET['isSelling']) ?? null;

        $model = $this->findModel($id);
        foreach ($model->answers as $answer) {
            $answer->delete();
        }

        $model->delete();

        return $this->redirect(['/selling/speech-module/', 'isSelling' => $isSelling]);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
