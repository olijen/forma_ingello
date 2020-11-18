<?php

namespace forma\modules\event\controllers;

use Yii;
use forma\modules\event\records\Event;
use forma\modules\event\records\EventSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
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
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        var_dump($_GET);
        $model = new Event();
        $model->loadDefaultValues(); //load default data from db
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                if (isset($_GET['json'])) {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return $model;
                }

                if(isset($_POST['close'])){
                    echo "<script>$('#modal').modal('hide')</script>";
                    echo "<script>$('#w0').fullCalendar('refetchEvents')</script>";
                    echo "<script>$('#w2').fullCalendar('refetchEvents')</script>";
                    exit;
                }

            } else {

                if (isset($_GET['json'])) {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return $model->getErrors();
                }
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {

            if (isset($_GET['json'])) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $model->getErrors();
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
            }



    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws HttpException
     */
    public function actionUpdate($id)
    {
        $model = Event::find()->where(['id' => $id])->one();


        if (!$model) {
            throw new HttpException('Ошибка');
        }

        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }
        if ($model->validate()){

            if ($model->load(Yii::$app->request->post())){

                if ($model->save()) {
                    if(isset($_POST['close'])){
                        echo "<script>$('#modal').modal('hide')</script>";
                        echo "<script>$('#w0').fullCalendar('refetchEvents')</script>";
                        echo "<script>$('#w2').fullCalendar('refetchEvents')</script>";
                        echo "<script>$('#w7').fullCalendar('refetchEvents')</script>";
                        exit;
                    }
                    if (isset($_GET['json'])) {
                        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return $model;
                    }
                    //return $this->redirect(['/event', 'id' => $model->id]);
                }
            } else {
                if (isset($_GET['json'])) {

                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return $model->getErrors();
                }
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            return $model->errors;
        }
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $eventsDatabase = Event::find()->all();

        $events = array();

        foreach ($eventsDatabase AS $real){
            //Testing
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $real->id;
            $Event->title = $real->name;
//            $Event->backgroundColor = $real->eventType->color;
//            $Event->borderColor = $real->eventType->color;
            $Event->start = date('Y-m-d\TH:i:s\Z',strtotime($real->date_from.' '.$real->start_time));
            $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($real->date_to.' '.$real->end_time));
            $events[] = $Event;
        }

        return $events;
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
