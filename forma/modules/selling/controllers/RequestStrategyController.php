<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\strategy\Strategy;
//use forma\modules\selling\records\strategy\Strategy;
use forma\modules\selling\records\talk\Request;
use Yii;
use forma\modules\selling\records\requeststrategy\RequestStrategy;
use forma\modules\selling\records\requeststrategy\RequestStrategySearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestStrategyController implements the CRUD actions for RequestStrategy model.
 */
class RequestStrategyController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all RequestStrategy records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestStrategySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RequestStrategy model.
     * @param integer $request_id
     * @param integer $strategy_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RequestStrategy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RequestStrategy();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'request_id' => $model->request_id, 'strategy_id' => $model->strategy_id]);
        }

        $request = Request::find()->all();
        $strategy = Strategy::find()->all();
        return $this->render('create', [
            'model' => $model,
            'request' => $request,
            'strategy' => $strategy,
        ]);
    }

    /**
     * Updates an existing RequestStrategy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $request_id
     * @param integer $strategy_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id)->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $request = Request::find()->all();
        $strategy = Strategy::find()->all();
        return $this->render('update', [
            'model' => $model,
            'request' => $request,
            'strategy' => $strategy,
        ]);
    }

    /**
     * Deletes an existing RequestStrategy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $request_id
     * @param integer $strategy_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RequestStrategy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param $id
     * @return RequestStrategy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model =  RequestStrategy::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
