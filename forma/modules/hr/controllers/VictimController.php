<?php

namespace forma\modules\hr\controllers;

use forma\components\Controller;
use forma\modules\hr\records\victim\Victim;
use forma\modules\hr\records\victim\VictimSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\httpclient\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * VictimController implements the CRUD actions for Victim model.
 */
class VictimController extends Controller
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
     * Lists all Victim models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VictimSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($victimId = Yii::$app->request->get('id')) {
            $victim = $this->findModel($victimId);

            if ($victim->load(Yii::$app->request->post()) && $victim->save()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                $data = ['output' => $victim->getAttributes(), 'success' => true];

                return $data;
            } else {
                return false;
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Victim model.
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
     * Creates a new Victim model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Victim();
        $model->loadDefaultValues(); //load default data from db

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->how_many > 1) {
                for ($i = 1; $i < $model->how_many; $i++) {
                    $modelChild = new Victim();
                    $modelChild->loadDefaultValues();
                    $modelChild->stay_for = $model->stay_for;
                    $modelChild->phone = $model->phone;
                    $modelChild->specialization = '-';
                    $modelChild->destination = $model->destination;
                    $modelChild->save();
                }
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Victim model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Victim model.
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
     * Finds the Victim model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Victim the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Victim::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
