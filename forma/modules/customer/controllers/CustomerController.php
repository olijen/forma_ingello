<?php

namespace forma\modules\customer\controllers;

use forma\modules\customer\records\Messenger;
use forma\modules\product\records\Product;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\services\SellingService;
use Yii;
use forma\modules\customer\records\Customer;
use forma\modules\customer\records\CustomerSearch;
use forma\components\Controller;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }

        $model = new Customer();

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
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $selling = Selling::find()->where(['customer_id' => $id])->one() ;
        if (
            $model->load(Yii::$app->request->post()) &&
            $model->save()
        ) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'dialog' => $selling,
            ]);
        }
    }
    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionView($id)
    {
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAddCustomer()
    {
        $path = \Yii::getAlias('@inst') ;
        $file = $path . '/instagram_service2.csv';
        if (($handle = fopen($file, "r")) !== FALSE) {
            $row = 1;
            while (($data = fgetcsv($handle, 1000)) !== FALSE) {
                $num = count($data);
                if ($row == 1) {
                    $row++;
                    continue;
                }
                $str = '';
                $vacancy_id = 87;
                foreach ($data as $k => $value) {
                    $str .= '\'' . $value . '\'' . ',';
                }
                $str = substr($str, 0, -1);


                $sql = "INSERT INTO customer (telegram,name,skype,description) VALUES ($str)";
                Yii::$app->db->createCommand($sql)->execute();
                $id = Yii::$app->db->getLastInsertID();
                $entityClass = \forma\modules\customer\records\Customer::className();
                $userId = Yii::$app->user->id;
                $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('" . $entityClass . "','" . $id . "','" . $userId . "')" . ';' . '<br>';
                Yii::$app->db->createCommand($sqlAccessory)->execute();

                $sql = "INSERT INTO selling (customer_id) VALUES ($id)";
                Yii::$app->db->createCommand($sql)->execute();
                $id = Yii::$app->db->getLastInsertID();
                $entityClass = \forma\modules\selling\records\selling\Selling::className();
                $userId = Yii::$app->user->id;
                $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('" . $entityClass . "','" . $id . "','" . $userId . "')" . ';' . '<br>';
                if (!Yii::$app->db->createCommand($sqlAccessory)->execute()){
                    de('Sorry,error');
                };
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSend()
    {
//        de(Yii::$app->request->post());
        if (Customer::sendMessage(Yii::$app->request->post()))
        {
            Yii::$app->session->setFlash('SentMessage', 'success');
        }

        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionImportExcel()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $excel = $_FILES['excel']['tmp_name'];
            $importer = new ExcelImporter();
            $success = $importer->import($excel);
            $errors = $importer->getErrors();

            return json_encode(compact('success', 'errors','excel'));
        }
    }


}
