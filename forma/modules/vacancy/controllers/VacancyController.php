<?php

namespace forma\modules\vacancy\controllers;

use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use Yii;
use forma\modules\vacancy\records\Vacancy;
use forma\modules\vacancy\records\VacancySearch;
use forma\components\Controller;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * VacancyController implements the CRUD actions for Vacancy model.
 */
class VacancyController extends Controller
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
     * Lists all Vacancy records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        Yii::debug($dataProvider->getModels());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vacancy model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }
        Url::remember([Yii::$app->request->url],'vacancy');
        $projectVacancies = ProjectVacancy::find()->where(['vacancy_id' => (int)$id])->all();
        $projects = [];
        $projectIds = [];
        foreach ($projectVacancies as $projectVacancy) {
            $projects[] = $projectVacancy->project;
        }
        if (Yii::$app->request->post('Vacancy')) {
            $interviewStateWorkerItems = InterviewState::getItems(Yii::$app->request->post('Vacancy')['projectId'], $id);
            return $this->render('view', [
                    'model' => $this->findModel($id),
                    'projects' => $projects,
                    'interviewStateWorkerItems' => $interviewStateWorkerItems,
                ]
            );
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'projects' => $projects,
            'interviewStateWorkerItems' => [],
            ]
        );
    }

    /**
     * Creates a new Vacancy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }
        $model = new Vacancy();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['id' => $model->id, 'name' => $model->name];
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Vacancy model.
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
     * Deletes an existing Vacancy model.
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
     * Finds the Vacancy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vacancy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vacancy::getAccessToOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
