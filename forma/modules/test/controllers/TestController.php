<?php

namespace forma\modules\test\controllers;

use forma\modules\test\records\TestType;
use forma\modules\test\records\Test;
use Yii;
use forma\modules\test\records\TestTypeField;
use forma\modules\test\records\TestTypeFieldSearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use forma\modules\customer\records\Customer;

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
//        $model_id = new TestType();

//        $id = $_GET['id'];
//        $test_id = TestTypeField::find()->where(['test_id' => $id])->all();
        $model = new TestTypeField();
        $searchModel = new TestTypeFieldSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [

//            'test_id'=>$test_id,
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
//        $model_test = $this->findModel($id);
        $model = new TestTypeField();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = $model->test_id;
            $name = TestType::find()->where(['id' => $id])->one();


            return $this->redirect(['index', 'id' => $model->test_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionTest($id)
    {

        $customer = new Customer();
        $model = new Test();
        $testType = TestType::find()->where(['id' => $id])->one();


        if (!empty($_POST)) {

            if ($_POST['Customer']) {
                $customer->name = $_POST['Customer']['name'];
                $customer->chief_email = $_POST['Customer']['chief_email'];
                $customer->description = $_POST['Customer']['description'];
                $customer->save();
            }
            $result = $_POST;
            return $this->render('@forma/modules/test/views/test/test_result.php',[
                'model'=> $model,
                'testType'=> $testType,
                'result'=>$result,
            ]);

            $model->result = $save;
            $model->customer_id = $customer->id;
            $model->test_type_id = $testType->id;
            $model->save();

            if ($model->save()) {
                return $this->redirect(['/test/result/index']);
            }
        }

        return $this->render('test', [
            'customer' => $customer,
            'testType' => $testType,
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

            return $this->redirect(['index', 'id' => $model->test_id]);
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
