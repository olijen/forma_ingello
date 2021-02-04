<?php

namespace forma\modules\hr\controllers;

use Yii;
use forma\modules\hr\records\InterviewVacancy;
use forma\modules\hr\records\InterviewVacancySearch;
use yii\helpers\Url;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InterviewVacancyController implements the CRUD actions for InterviewVacancy model.
 */
class InterviewVacancyController extends Controller
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
     * Lists all InterviewVacancy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InterviewVacancySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InterviewVacancy model.
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
     * Creates a new InterviewVacancy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InterviewVacancy();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $sellingId = $model->interview->id;
            return $this->redirect(['/hr/interview/view', 'id' => $sellingId]);
        } else {
            $sellingId = Yii::$app->request->get('selling_id');
            return $this->render('create', compact('model', 'sellingId'));
        }
    }

    /**
     * Updates an existing InterviewVacancy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InterviewVacancy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $sellingId = $model->interview->id;

        $model->delete();

        return $this->redirect(['/hr/interview/view', 'id' => $sellingId]);
    }

    /**
     * Finds the InterviewVacancy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InterviewVacancy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InterviewVacancy::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
