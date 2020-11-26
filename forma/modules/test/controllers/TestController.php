<?php

namespace app\modules\test\controllers;

use Yii;
use app\modules\test\records\TestTypeField;
use forma\modules\test\records\TestType;
use app\modules\test\records\TestTypeFieldSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestController implements the CRUD actions for TestTypeField model.
 */
class TestController extends Controller
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
     * Lists all TestTypeField models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $test_id = TestTypeField::find()->where(['test_id'=>$id])->all();
            $model = new TestType();
            $searchModel = new TestTypeFieldSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'test_id'=>$test_id,
                'model'=>$model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else {
            $model = new TestType();
            $searchModel = new TestTypeFieldSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single TestTypeField model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $searchModel = new TestTypeFieldSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('/test/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TestTypeField model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TestTypeField();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionTest($id){
        $searchModel = new TestTypeFieldSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $test = TestTypeField::find()->where(['test_id'=>$id])->one();
        $model = new TestTypeField();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('test', [

            'test'=>$test,
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing TestTypeField model.
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
     * Deletes an existing TestTypeField model.
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
     * Finds the TestTypeField model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TestTypeField the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TestTypeField::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
