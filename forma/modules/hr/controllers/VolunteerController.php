<?php

namespace forma\modules\hr\controllers;

use Yii;
use forma\modules\hr\records\volunteer\Volunteer;
use forma\modules\hr\records\volunteer\VolunteerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VolunteerController implements the CRUD actions for Volunteer model.
 */
class VolunteerController extends Controller
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
     * Lists all Volunteer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VolunteerSearch();

        if (isset($_GET['how_many']) &&
            isset($_GET['support_type'])) {
            $searchModel->support_type = $_GET['support_type'];
            $searchModel->capacity = $_GET['how_many'];
        }

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Volunteer model.
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
     * Creates a new Volunteer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Volunteer();
        $model->loadDefaultValues(); //load default data from db

        $optionsName = null;
        if (isset($_POST['Volunteer'])) {
            if (!empty($_POST['Volunteer']['options'])) {
                $optionsArray = $_POST['Volunteer']['options'];
                foreach ($optionsArray as $option) {
                    $optionsName .= $model::getOptions()[$option] . ',';
                }

                $model->options = $optionsName;
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Volunteer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $optionsName = null;
        if (Yii::$app->request->post('Volunteer')) {
            $optionsArray = $_POST['Volunteer']['options'];
            foreach ($optionsArray as $option) {
                $optionsName .= $model::getOptions()[$option] . ',';
            }

            $model->options = $optionsName;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Volunteer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Volunteer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Volunteer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Volunteer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBooking($id)
    {
        if (isset($_POST['volunteerId']) && isset($_POST['howMany'])) {
            $volunteer = Volunteer::find()->where(['id' => $_POST['volunteerId']])->one();
            $volunteer->capacity = $volunteer->capacity - $_POST['howMany'];
            $volunteer->save();
            return $this->redirect('/hr/victim/index');
        }
    }
}
