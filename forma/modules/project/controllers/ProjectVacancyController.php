<?php

namespace forma\modules\project\controllers;

use forma\modules\project\records\project\Project;
use forma\modules\vacancy\records\Vacancy;
use Yii;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use forma\modules\project\records\projectvacancy\ProjectVacancySearch;
use forma\components\Controller;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectVacancyController implements the CRUD actions for ProjectVacancy model.
 */
class ProjectVacancyController extends Controller
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
     * Lists all ProjectVacancy records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectVacancySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectVacancy model.
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
     * Creates a new ProjectVacancy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null, $vacancy_id = null)
    {
        $model = new ProjectVacancy();
        $vacancyModel = new Vacancy();
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
            if (
                (
                    $vacancyModel->load(Yii::$app->request->post())
                ) && (
                    $vacancyModel->save()
                )
            ) {
                if ($vacancyModel->id) {
                    $model->vacancy_id = $vacancyModel->id;
                    $model->load(Yii::$app->request->post());
                    $model->save();
                }
                return $this->redirect(Url::to(['/hr/form/index']));
            }
            return $this->render('create', [
                'model' => [],
                'id' => null,
                'vacancy_id' => null,
                'vacancyModel' => $vacancyModel,
                'projectVacancyModel' => $model
            ]);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['project/index']);
        }
        return $this->render('create', [
            'model' => $model,
            'id' => $id ? $id : null,
            'vacancy_id' => $vacancy_id ? $vacancy_id : null,
            'projectVacancyModel' => $model,
            'vacancyModel' => $vacancyModel
        ]);
    }

    /**
     * Updates an existing ProjectVacancy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectVacancy model.
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
     * Finds the ProjectVacancy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectVacancy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectVacancy::getAccessToOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
