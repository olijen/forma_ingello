<?php

namespace forma\modules\core\controllers;

use Yii;
use forma\modules\core\records\RuleRank;
use forma\modules\core\records\RuleRankSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RuleRankController implements the CRUD actions for RuleRank model.
 */
class RuleRankController extends Controller
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
     * Lists all RuleRank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuleRankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/user-profile/rulerank/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RuleRank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/user-profile/rulerank/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RuleRank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RuleRank();
        $model->loadDefaultValues(); //load default data from db

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('/user-profile/rulerank/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RuleRank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/user-profile/rulerank/view', 'id' => $model->id]);
        } else {
            return $this->render('/user-profile/rulerank/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RuleRank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/user-profile/rulerank/index']);
    }

    /**
     * Finds the RuleRank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RuleRank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RuleRank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
