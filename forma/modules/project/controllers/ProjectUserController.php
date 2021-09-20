<?php

namespace forma\modules\project\controllers;

use Yii;
use forma\modules\project\records\projectuser\ProjectUser;
use forma\modules\project\records\projectuser\ProjectUserSearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectUserController implements the CRUD actions for ProjectUser model.
 */
class ProjectUserController extends Controller
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
     * Lists all ProjectUser records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectUser model.
     * @param integer $project_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($project_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($project_id, $user_id),
        ]);
    }

    /**
     * Creates a new ProjectUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'project_id' => $model->project_id, 'user_id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $project_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($project_id, $user_id)
    {
        $model = $this->findModel($project_id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'project_id' => $model->project_id, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $project_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($project_id, $user_id)
    {
        $this->findModel($project_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $project_id
     * @param integer $user_id
     * @return ProjectUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($project_id, $user_id)
    {
        if (($model = ProjectUser::findOne(['project_id' => $project_id, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
