<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\talk\Request;
use forma\modules\selling\records\talk\RequestStrategy;
use Yii;
use forma\modules\selling\records\talk\Answer;
use forma\modules\selling\records\talk\AnswerSearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class AnswerController extends Controller
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
     * Lists all Answer records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Answer model.
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
     * Creates a new Answer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Answer();
        $isSelling = $_GET['isSelling'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/selling/speech-module', 'isSelling' => $isSelling]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Creates a new Answer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionFastCreate()
    {

        // Создать ответ
        $model = new Answer();
        if (!$model->load(Yii::$app->request->post())) {
            return $this->render('fast-create', [
                'model' => $model,
            ]);
        }

        //Обработать стратегию
        //Создать реквест, если нужно
        if (!empty($_REQUEST['request'])) {
            $request = new Request;
            $request->text = $_REQUEST['request'];
            $request->is_manager = $_REQUEST['Request']['is_manager'];
            $request->save();
            $model->request_id = $request->id;
        }

        if (!empty($_REQUEST['strategy'])) {
            $strategyId = $_REQUEST['strategy'];
            $rs = RequestStrategy::find()->where($requestStrategyValues = [
                'strategy_id' => $strategyId,
                'request_id' => $model->request_id,
            ])->one();
            if (!$rs) {
                $rs = new RequestStrategy();
                $rs->strategy_id = $strategyId;
                $rs->request_id = $model->request_id;
                $rs->save();
            }
        }

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('fast-create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Answer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $isSelling = $_GET['isSelling'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/selling/speech-module?isSelling=' . $isSelling);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Answer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $isSelling = $_GET['isSelling'];
        return $this->redirect(['/selling/speech-module', 'isSelling' => $isSelling]);
    }

    /**
     * Finds the Answer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Answer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Answer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
