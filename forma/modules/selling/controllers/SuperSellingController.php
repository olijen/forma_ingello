<?php

namespace forma\modules\selling\controllers;

use forma\modules\customer\records\Customer;
use forma\modules\selling\records\state\State;
use Yii;
use forma\modules\selling\records\superselling\Selling;
use forma\modules\selling\records\superselling\SellingSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuperSellingController implements the CRUD actions for Selling model.
 */
class SuperSellingController extends Controller
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
     * Lists all Selling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SellingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->request->post('hasEditable')){
            $requestPost = Yii::$app->request->post();
            $sellingId = $requestPost['editableKey'];
            $selling = Selling::find()->where(['id'=>$sellingId])->one();
            $index = Yii::$app->request->post('editableIndex');
            $customer = Customer::find()->where(['id'=>$selling->customer_id])->one();

            if(isset($requestPost['Selling'][$index]['customerName'])){
                $newName = $requestPost['Selling'][$index]['customerName'];
                $customer->name = $newName;
                if($customer->save()){
                    return true;
                }
            }

            if(isset($requestPost['Selling'][$index]['customerPhone'])  ){
                $newPhone = $requestPost['Selling'][$index]['customerPhone'];
                $customer->chief_phone = $newPhone;
                if($customer->save()){
                    return true;
                }
            }

            if(isset($requestPost['Selling'][$index]['stateName'])){
                $newSate = $requestPost['Selling'][$index]['stateName'];
                $state = State::find()->where(['name'=>$newSate])->one();
                $selling->state_id = $state->id;
                if($selling->save()){
                    return true;
                }
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Selling model.
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
     * Creates a new Selling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Selling();
        $model->loadDefaultValues(); //load default data from db

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Selling model.
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
     * Deletes an existing Selling model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeleteSelection()
    {
        $selection = Yii::$app->request->post('selection');

        if ($selection) {
            Selling::deleteAll(['IN', 'id', $selection]);
        }

        return $this->redirect('/selling/super-selling/index');
    }

    /**
     * Finds the Selling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Selling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Selling::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
