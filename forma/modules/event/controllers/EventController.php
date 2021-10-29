<?php

namespace forma\modules\event\controllers;

use forma\modules\selling\records\selling\Selling;
use Yii;
use forma\modules\event\records\Event;
use forma\modules\event\records\EventSearch;
use forma\components\Controller;
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
     * Lists all Event records.
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

    public function actionUpdateEventMonth()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 0;
        $events = $dataProvider->getModels();

        foreach ($events as $event) {
            $dateFrom = new \DateTime($event->date_from->format('DD.MM.YYYY'));
            $dateTo = new \DateTime($event->date_to->format('DD.MM.YYYY'));

            $dateFrom->add((new \DateInterval('P1M')));
            $dateTo->add((new \DateInterval('P1M')));

            $event->date_from = $dateFrom->format('DD.MM.YYYY');
            $event->date_to = $dateTo->format('DD.MM.YYYY');

            $event->save();
        }
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
        $model = new Event();
        $model->loadDefaultValues(); //load default data from db
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }

        if ($model->load(Yii::$app->request->post())) {
            Yii::debug('Вывожу данные календаря');
            Yii::debug($model);
            if(isset($_GET['selling_id']))
            $model->selling_id = $_GET['selling_id'];
            if(isset($_GET['hash']))
                $model->hash_for_event = $_GET['hash'];
            if ($model->save()) {
                if (isset($_GET['json'])) {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return $model;
                }

                if(isset($_POST['close'])){
                    echo "<script>$('#modal').modal('hide')</script>";
                    echo "<script>$('#w0').fullCalendar('refetchEvents')</script>";
                    echo "<script>$('#w2').fullCalendar('refetchEvents')</script>";
                    echo "<script>$('#w1').fullCalendar('refetchEvents')</script>";
                    echo "<script>$('#w7').fullCalendar('refetchEvents')</script>";;
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
        $dates = explode("-",$model->date_from);
        $model->date_from =$dates[2].'.'.$dates[1].'.'.$dates[0];
        $dates = explode("-",$model->date_to);
        $model->date_to =$dates[2].'.'.$dates[1].'.'.$dates[0];
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
                        echo "<script>$('#w1').fullCalendar('refetchEvents')</script>";
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

        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 0;
        $eventsDatabase = $dataProvider->getModels();

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
