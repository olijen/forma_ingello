<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\state\StateSearchState;
use Yii;
use forma\modules\selling\records\state\State;
use forma\modules\selling\records\state\StateSearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use forma\modules\selling\records\state\StateToState;


/**
 * MainStateController implements the CRUD actions for State model.
 */
class MainStateController extends Controller
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
     * Lists all State models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StateSearch();
        $dataProvider = $searchModel->userSearch(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single State model.
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
     * Creates a new State model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $id = Yii::$app->user->identity->id;
        $model = new State();
        $model->user_id = $id;
        $allStates = State::find()->where(['user_id' => Yii::$app->user->id])->all();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(count($allStates) > 0)
                foreach($allStates as $state) {
                    $toState = new StateSearchState();
                    $toState->state_id = $model->id;
                    $toState->to_state_id = $state->id;
                    $toState->save();
                }
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing State model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $toState = new StateSearchState();
        $dataProvider = $toState->search(Yii::$app->request->queryParams, $id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            StateToState::deleteAll(['state_id' => $id]);
            if (isset($_POST['StateToState']) && !empty($_POST['StateToState'])) {
                foreach ($_POST['StateToState'] as $state) {
                    $stateToState = new StateToState();
                    $stateToState->state_id = $id;
                    $stateToState->to_state_id = $state;
                    $stateToState->save();
                }
            }
            return $this->redirect('update?id=' . $id);
        }

        if ($toState->load(Yii::$app->request->post()) && $toState->save()) {
            return $this->redirect('update?id=' . $id);
        }


        return $this->render('update', [
            'model' => $model,
            'toState' => $toState,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Deletes an existing State model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the State model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return State the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = State::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
