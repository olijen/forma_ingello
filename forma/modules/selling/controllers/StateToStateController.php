<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\state\State;
use phpDocumentor\Reflection\Types\Object_;
use Yii;
use forma\modules\selling\records\state\StateToState;
use forma\modules\selling\records\state\StateSearchState;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StateToStateController implements the CRUD actions for StateToState model.
 */
class StateToStateController extends Controller
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
     * Lists all StateToState models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new StateSearchState();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single StateToState model.
     * @param integer $id
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
     * Creates a new StateToState model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = [])
    {

        $model = new StateToState();

        $state = State::findOne($id);

        $toState = $state->state;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('main-state/update?id=');
        }

        return $this->render('create', [
            'model' => $model,
            'data' => $toState
        ]);
    }

    /**
     * Updates an existing StateToState model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StateToState model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $stateId = $model->state_id;
        $model->delete();

        return $this->redirect(['main-state/update?id=' . $stateId]);
    }

    /**
     * Finds the StateToState model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StateToState the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StateToState::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
