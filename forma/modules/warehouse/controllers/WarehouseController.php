<?php

namespace forma\modules\warehouse\controllers;

use forma\modules\warehouse\records\WarehouseUser;
use Yii;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseSearch;
use forma\components\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use forma\modules\warehouse\records\WarehouseProductSearch;
use yii\web\Response;

/**
 * WarehouseController implements the CRUD actions for Warehouse model.
 */
class WarehouseController extends Controller
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
     * Lists all Warehouse records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WarehouseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
            return $this->render('index', compact('searchModel', 'dataProvider'));
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->belongsToUser()) {

            if (Yii::$app->request->isAjax) {
                $this->layout = '@app/modules/core/views/layouts/modal';
                return $this->render('detail', compact('model'));
            }

            $warehouseProductsSearchModel = new WarehouseProductSearch;

            $params = Yii::$app->request->queryParams;
            $params['WarehouseProductSearch']['warehouse_id'] = $id;

            $warehouseProductsDataProvider = $warehouseProductsSearchModel->search($params);

            return $this->render('view', compact(
                'model',
                'warehouseProductsSearchModel',
                'warehouseProductsDataProvider'
            ));
        }

        throw new ForbiddenHttpException;
    }

    /**
     * Creates a new Warehouse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }

        $model = new Warehouse();

        if ($model->load(Yii::$app->request->post())) {
            if($model->capacity == null){
                $model->capacity = 1000;
            }
            $model->save();
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
     * Updates an existing Warehouse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->belongsToUser()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        throw new ForbiddenHttpException;
    }

    /**
     * Deletes an existing Warehouse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->belongsToUser()) {
            $model->delete();
            return $this->redirect(['index']);
        }

        throw new ForbiddenHttpException;
    }
    
    public function actionAllRemains()
    {
        $warehouseProductsSearchModel = new WarehouseProductSearch;

        $params = Yii::$app->request->queryParams;
        $warehouseProductsDataProvider = $warehouseProductsSearchModel->search($params);

        return $this->render('remains', compact(
            'warehouseProductsSearchModel',
            'warehouseProductsDataProvider'
        ));
    }

    /**
     * Finds the Warehouse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Warehouse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Warehouse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }
    public function actionDownloadExampleFile()
    {
        $path = \Yii::getAlias('@uploads') ;
        $file = $path . '/example_warehouse.xls';

        if (file_exists($file)) {
            return \Yii::$app->response->sendFile($file);
        }
        throw new \Exception('File not found');
    }
}
