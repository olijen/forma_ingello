<?php

namespace forma\modules\product\controllers;

use forma\extensions\kartik\DynaGrid;
use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\Category;
use forma\modules\product\records\Field;
use forma\modules\product\records\FieldProductValue;
use forma\modules\product\records\FieldSearch;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\selling\records\selling\Selling;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\services\RemainsService;
use Yii;
use forma\modules\product\services\PackUnitService;
use forma\modules\product\services\ProductService;
use forma\modules\product\records\Product;
use forma\modules\product\records\ProductSearch;
use yii\base\Model;
use forma\components\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use forma\components\ExcelImporter;
use forma\modules\product\components\SkuGenerator;
use forma\modules\product\records\ProductPackUnit;
use forma\modules\product\records\PackUnit;
use yii\web\Response;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = !in_array($action->id, ['get-sku', 'import-excel']);
        return parent::beforeAction($action);
    }

    /**
     * Lists all Product records.
     * @return mixed
     */
    public function actionIndex()
    {
        $product = new Product();
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $renderVar = ['searchModel' => $searchModel,
                      'dataProvider' => $dataProvider,];

        if (!empty($_GET['ProductSearch']['category_id']) && !empty($dataProvider->getModels()[0])) {
            $currentAndParentField = Field::getCurrentAndParentField($dataProvider, $searchModel, $_GET['ProductSearch']['category_id']);
            $allFieldProductValue = Product::getAllFieldProductValue();
            $renderVar = array_merge($currentAndParentField, ['allFieldProductValue' => $allFieldProductValue]);
        }

        return $this->render('index', $renderVar);
    }

    public function actionCreate()
    {

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $model = ProductService::save(null, $post);

            if (isset($post['FieldProductValue'])) {
                FieldProductValue::eachFieldProductValueSave($post['FieldProductValue'], $model->id);
            }

            return $this->redirect(['index']);
        }
        $model = ProductService::create();
        $field = new Field();
        return $this->render('create', [
            'model' => $model,
            'field' => $field,
        ]);

    }


    function actionPjaxAttribute()
    {
        $this->layout = '@app/modules/core/views/layouts/modal';
        if (Yii::$app->request->isPjax) {

            $category_id = Yii::$app->request->post()['Product']['category_id'];
            // категория из обьекта продукта постом
            $field = new Field();
            $parentCategoryId = $category_id;
            $categoriesId = Category::getCurrentAndParentId($parentCategoryId);
            $fieldAttributes = $field->widgetGetList($categoriesId);

            return $this->render('pjax_attribute', [
                'category_id' => $category_id,
                'field' => $field,
                'fieldAttributes' => $fieldAttributes,
            ]);

        }
    }


    public function actionUpdate($id)
    {
        $model = ProductService::get($id);
        $field = new Field();

        $category_id = $model->category_id;
        $categoriesId = Category::getCurrentAndParentId($category_id);
        $fieldAttributes = $field->widgetGetList($categoriesId);

        if (Yii::$app->request->isPost) {
            if (isset(Yii::$app->request->post()['FieldProductValue'])) {
                $fieldProductValues = Yii::$app->request->post()['FieldProductValue'];
                FieldProductValue::eachFieldProductValueSave($fieldProductValues, $model->id);
            }

            ProductService::save($id, Yii::$app->request->post());
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
            'category_id' => $category_id,
            'fieldAttributes' => $fieldAttributes,
            'field' => $field,
        ]);

    }


    /**
     * Deletes an existing Product model.
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
            Product::deleteAll(['IN', 'id', $selection]);
        }

        return $this->redirect('/selling/main/index');
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetSku()
    {
        if (Yii::$app->request->isAjax) {
            $sku = SkuGenerator::generate(Yii::$app->request->post()['Product']);
            echo json_encode(['sku' => $sku]);
            exit;
        }
    }

    public function actionImportExcel()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $excel = $_FILES['excel']['tmp_name'];
            $importer = new ExcelImporter();
            $success = $importer->import($excel);
            $errors = $importer->getErrors();
            $warehouseId = $importer->getWarehouseId();

            return json_encode(compact('success', 'errors', 'warehouseId'));
        }
    }


    public static function actionGetVariationByPackUnit()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['success' => true];

        $productId = Yii::$app->request->post('productId');
        $packUnitId = Yii::$app->request->post('packUnitId');

        /** @var Product $model */
        $model = ProductService::getVariationByPackUnit($productId, $packUnitId);
        $response['VariationId'] = $model->id;

        return $response;
    }

    public function actionCheckAvailable()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['success' => true];

        $productId = Yii::$app->request->post('productId');
        $warehouseId = Yii::$app->request->post('warehouseId');

        $response['available'] = RemainsService::getAvailable($productId, $warehouseId);
        return $response;
    }

    public function actionSearchBySupplier($purchaseId, $q)
    {
        /** @var Purchase $purchase */
        $purchase = PurchaseService::get($purchaseId);

        /** @var Warehouse $warehouse */
        $warehouse = $purchase->warehouse;

        if ($warehouse->belongsToUser()) {
            if (Yii::$app->request->isAjax && $q) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['results' => ProductService::searchForPurchase($purchase, $q)];
            }
        }

        throw new ForbiddenHttpException;
    }

    public function actionSearchForPurchase($purchaseId, $q)
    {
        /** @var Purchase $purchase */
        $purchase = PurchaseService::get($purchaseId);

        /** @var Warehouse $warehouse */
        $warehouse = $purchase->warehouse;

        if ($warehouse->belongsToUser()) {
            if (Yii::$app->request->isAjax && $q) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['results' => ProductService::search($q)];
            }
        }

        throw new ForbiddenHttpException;
    }
}
