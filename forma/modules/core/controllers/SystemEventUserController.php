<?php

namespace forma\modules\core\controllers;

use forma\modules\core\records\SystemEventUserService;
use Yii;
use forma\modules\core\records\SystemEventUser;
use forma\modules\core\records\SystemEventUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SystemEventUserController implements the CRUD actions for SystemEventUser model.
 */
class SystemEventUserController extends Controller
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
     * Lists all SystemEventUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SystemEventUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Page with subscribe system, where user select some events, which deliver to user e-mail after event
     * Страница, где юзер может подписаться на события, которые отправятся по емайлу после совершения
     * @return mixed
     */
    public function actionSubscribe(){
        SystemEventUserService::init();
        //получить все подписки
        $subscribes = SystemEventUser::findAll(['user_id' => Yii::$app->user->id]);


        $models = SystemEventUserService::$models;
        return $this->render('subscribe', ['models' => $models, 'subscribes' => $subscribes]);
    }

    /**
     * Page where user's subscribes save into DB. Redirect
     * Страница, где подписки юзера сохраняются в БД. Редирект
     * @return mixed
     */
    public function actionSaveSubscribe(){

        SystemEventUserService::deleteOldSystemEventUser();
        SystemEventUserService::init();
        //получим массив, в котором содержаться все события, на которые подписался пользователь
        if(count(Yii::$app->request->get()) > 0 ) {
            $saveEventsForSubscribe = SystemEventUserService::saveSubscribes(Yii::$app->request->get());
            foreach ($saveEventsForSubscribe as $key => $value) {
                $system_event_user = new SystemEventUser();
                $system_event_user->loadSubscribe([$key, $value]);
                $system_event_user->save();
            }
        }

        return $this->redirect(['subscribe']);
    }

    /**
     * Displays a single SystemEventUser model.
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
     * Creates a new SystemEventUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemEventUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SystemEventUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SystemEventUser model.
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
     * Finds the SystemEventUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemEventUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemEventUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
