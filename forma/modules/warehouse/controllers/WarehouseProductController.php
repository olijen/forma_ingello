<?php

namespace forma\modules\warehouse\controllers;

use forma\modules\product\records\Product;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\services\SellingService;
use forma\modules\transit\records\transit\Transit;
use forma\modules\transit\services\TransitService;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\services\RemainsService;
use forma\modules\warehouse\services\WarehouseService;
use Yii;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\warehouse\records\WarehouseProductSearch;
use yii\db\Query;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * WarehouseProductController implements the CRUD actions for WarehouseProduct model.
 */
class WarehouseProductController extends Controller
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
     * Creates a new WarehouseProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WarehouseProduct();

        if ($model->load(Yii::$app->request->post())) {
            $warehouse = Warehouse::findOne($model->warehouse_id);
            if ($warehouse->belongsToUser()) {
                $model->save();
                return $this->redirect(['/warehouse/warehouse/view', 'id' => $model->warehouse->id]);
            }
        } else {
            $warehouseId = Yii::$app->request->get('warehouse_id');
            $warehouse = Warehouse::findOne($warehouseId);
            if ($warehouse->belongsToUser()) {
                return $this->render('create', compact('model', 'warehouse'));
            }
        }

        throw new ForbiddenHttpException;
    }

    /**
     * Updates an existing WarehouseProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->warehouse->belongsToUser()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['/warehouse/warehouse/view', 'id' => $model->warehouse->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        throw new ForbiddenHttpException;
    }

    /**
     * Deletes an existing WarehouseProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->warehouse->belongsToUser()) {
            $warehouseId = $model->warehouse->id;
            $model->delete();

            return $this->redirect(['/warehouse/warehouse/view', 'id' => $warehouseId]);
        }

        throw new ForbiddenHttpException;
    }

    /**
     * Finds the WarehouseProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WarehouseProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WarehouseProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteSelection()
    {
        $warehouse = Warehouse::findOne(Yii::$app->request->get('warehouse_id'));
        $selection = Yii::$app->request->post('selection');

        if ($selection) {
            if ($warehouse->belongsToUser()) {
                $model = new WarehouseProduct;
                $model->deleteAll([
                    'AND',
                    ['IN', 'id', $selection],
                    'warehouse_id' => $warehouse->id
                ]);

                return $this->redirect(Url::to(['warehouse/view', 'id' => $warehouse->id]));
            }

            throw new ForbiddenHttpException;
        }
    }

    public function actionSearchForSelling($sellingId, $q)
    {
        /** @var Selling $selling */
        $selling = SellingService::get($sellingId);

        /** @var Warehouse $warehouse */
        $warehouse = $selling->warehouse;

        Yii::debug($selling->getSellingToken() . ' = '. Yii::$app->request->get('selling_token'));

        //todo:
        if (true || $warehouse->belongsToUser() || $selling->getSellingToken() == Yii::$app->request->get('selling_token')) {
            if (Yii::$app->request->isAjax && $q) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['results' => RemainsService::searchByWarehouse($warehouse->id, $q)];
            }
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionSearchForTransit($transitId, $q)
    {
        /** @var Transit $transit */
        $transit = TransitService::get($transitId);

        /** @var Warehouse $warehouse */
        $warehouse = $transit->fromWarehouse;

        if ($warehouse->belongsToUser()) {
            if (Yii::$app->request->isAjax && $q) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['results' => RemainsService::searchByWarehouse($warehouse->id, $q)];
            }
        }

        throw new ForbiddenHttpException;
    }

    public function actionCheckAvailable()
    {
        Yii::debug("dsa'dlssdlfk;dslkf");
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['success' => true];

        $productId = Yii::$app->request->post('productId');
        $warehouseId = Yii::$app->request->post('warehouseId');

        $response['available'] = RemainsService::getAvailable($productId, $warehouseId);
        return $response;
    }
}
