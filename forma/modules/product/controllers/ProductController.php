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
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\services\RemainsService;
use Yii;
use forma\modules\product\services\PackUnitService;
use forma\modules\product\services\ProductService;
use forma\modules\product\records\Product;
use forma\modules\product\records\ProductSearch;
use yii\base\Model;
use yii\web\Controller;
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (!empty($_GET['ProductSearch']['category_id']) && !empty($dataProvider->getModels()[0])) {
            return $this->getCurrentAndParentFieldCategory($dataProvider, $searchModel);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function getCurrentAndParentFieldCategory($dataProvider, $searchModel)
    {
        $category_id = $dataProvider->getModels()[0]->category_id;
        $field = new Field();
        $parentCategoryId = $category_id;
        $parentsCategoriesId = [];
        while(!is_null($parentCategoryId)){
            $categoryModel = Category::findOne($parentCategoryId);
            if (!is_null($categoryModel)) {
                $parentCategoryId = $categoryModel->parent_id;
                $parentsCategoriesId [] = $categoryModel->id;
            }else{
                $parentCategoryId = null;
            }
        }
        $categoriesId = $parentsCategoriesId;
        $fieldValues = $field->widgetGetList($categoriesId);

        return $this->render('index', [
            'fieldValues' => $fieldValues,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        if (Yii::$app->request->isAjax) {
            $model = ProductService::save(null, Yii::$app->request->post());
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        if (Yii::$app->request->isPost) {
            $newProduct = ProductService::save(null, Yii::$app->request->post());
            $productId = $newProduct->id;

            if (isset(Yii::$app->request->post()['FieldProductValue'])) {
                $fieldProductValues = Yii::$app->request->post()['FieldProductValue'];
                foreach ($fieldProductValues as $fieldId => $fieldValueModel) {
                    foreach ($fieldValueModel as $fieldValueId => $fieldValue) {
                        $this->fieldProductValueCreate($fieldId, $fieldValue, $productId);
                    }
                }
            }
            return $this->redirect(['index']);
        } else {
            $model = ProductService::create();
            $field = new Field();
            $fieldAttributes = null;
            return $this->render('create', [
                'model' => $model,
                'fieldAttributes' => $fieldAttributes,
                'field' => $field,
            ]);
        }
    }


    function actionPjaxAttribute()
    {
        $this->layout = '@app/modules/core/views/layouts/modal';
        if (Yii::$app->request->isPjax) {

            $category_id = Yii::$app->request->post()['Product']['category_id'];
            // категория из обьекта продукта постом
            $field = new Field();
            $parentCategoryId = $category_id;
            while(!is_null($parentCategoryId)){
                $categoryModel = Category::findOne($parentCategoryId);
                $parentCategoryId = $categoryModel->parent_id;
                $parentsCategoryId [ ] = $categoryModel->id;
            }
            $categoriesId = $parentsCategoryId;
            $fieldAttributes = $field->widgetGetList($categoriesId);

            return $this->render('pjax_attribute', [
                'category_id' => $category_id,
                'field' => $field,
                'fieldAttributes' => $fieldAttributes,
            ]);

        } else {
            return 'Все плохо (actionPjaxAttribute)';
        }

    }

    public function fieldProductValueCreate($fieldId, $fieldValue, $productId)
    {
        $saveProductValue = new FieldProductValue();
        $field_id = Field::findOne($fieldId);
        $saveProductValue->product_id = $productId;
        if (isset($fieldValue['multiSelect']['value'])) {
            if (!empty($fieldValue['multiSelect']['value'])) {
                $saveProductValue->value = json_encode($fieldValue['multiSelect']['value']);
            } else {
                $saveProductValue->value = '';
            }
        } elseif (isset($fieldValue['value'])) {
            $saveProductValue->value = $fieldValue['value'];
        }

        $saveProductValue->field_id = $field_id->id;
        if (!$saveProductValue->validate()) {
            $saveProductValue->errors;
            var_dump($saveProductValue->errors);
            die();
        }
        $saveProductValue->save();
    }

    public function fieldProductValueUpdate($fieldValueId, $fieldValue)
    {
        $saveProductValue = FieldProductValue::findOne($fieldValueId);

        if (isset($fieldValue['multiSelect']['value'])) {
            if (!empty($fieldValue['multiSelect']['value'])) {
                $saveProductValue->value = json_encode($fieldValue['multiSelect']['value']);
            } else {
                $saveProductValue->value = '';
            }

        } elseif (isset($fieldValue['value'])) {
            $saveProductValue->value = $fieldValue['value'];
        }

        if (!$saveProductValue->validate()) {
            $saveProductValue->errors;
            var_dump($saveProductValue->errors);
            die();
        }
        $saveProductValue->save();
    }

    public function actionUpdate($id)
    {
        $model = ProductService::get($id);
        $field = new Field();

        $category_id = $model->category_id;
        $parentCategoryId = $category_id;

        while(!is_null($parentCategoryId)){
            $categoryModel = Category::findOne($parentCategoryId);
            $parentCategoryId = $categoryModel->parent_id;
            $parentsCategoryId [ ] = $categoryModel->id;
        }
        $categoriesId = $parentsCategoryId;
        $fieldAttributes = $field->widgetGetList($categoriesId);

        if (Yii::$app->request->isPost) {
            $fieldProductValues = Yii::$app->request->post()['FieldProductValue'];

            foreach ($fieldProductValues as $fieldId => $fieldValueModel) {
                foreach ($fieldValueModel as $fieldValueId => $fieldValue) {
                    if ($fieldValueId == 'null') {
                        $this->fieldProductValueCreate($fieldId, $fieldValue, $productId = $id);
                    } else {
                        $this->fieldProductValueUpdate($fieldValueId, $fieldValue);
                    }
                }
            }
            ProductService::save($id, Yii::$app->request->post());
            return $this->redirect(['index']);
        } else {

            return $this->render('update', [
                'model' => $model,
                'category_id' => $category_id,
                'fieldAttributes' => $fieldAttributes,
                'field' => $field,
            ]);
        }
    }


    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionDelete($id)
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

        return $this->actionIndex();
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public
    function actionSearch($term)
    {
        if (Yii::$app->request->isAjax) {
            $results = Product::find()
                ->joinWith(['manufacturer', 'category'], false, 'INNER JOIN')
                ->select(['product.id', 'product.name as label'])
                ->where(['or',
                    ['like', 'product.name', $term],
                    ['like', 'product.sku', $term],
                    ['like', 'manufacturer.name', $term],
                    ['like', 'category.name', $term],
                ])
                ->asArray()
                ->all();

            echo json_encode($results);
        }
    }

    public
    function actionGetSku()
    {
        if (Yii::$app->request->isAjax) {
            $sku = SkuGenerator::generate(Yii::$app->request->post()['Product']);
            echo json_encode(['sku' => $sku]);
            exit;
        }
    }

    public
    function actionImportExcel()
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

    public
    function actionAddPacksUnits()
    {
        $productId = Yii::$app->request->post()['Product']['id'];
        $packsUnitsIds = Yii::$app->request->post()['Product']['packUnits'];

        $productPackUnit = new ProductPackUnit;
        $productPackUnit->deleteAll(['in', 'product_id', $productId]);

        $packsUnitsIds = (array)$packsUnitsIds;
        $packsUnitsIds[] = PackUnit::findOne(['bottles_quantity' => 1])->id;

        $model = $this->findModel($productId);

        foreach ($packsUnitsIds as $packUnitId) {
            if (strpos($packUnitId, '/') !== false) {
                $packUnit = new PackUnit;
                $packUnit->name = explode('/', $packUnitId)[0];
                $packUnit->bottles_quantity = explode('/', $packUnitId)[1];
                $packUnit->save();
                $packUnitId = $packUnit->id;
            }

            $productPackUnit->isNewRecord = true;
            $productPackUnit->id = null;

            $productPackUnit->setAttributes([
                'product_id' => $productId,
                'pack_unit_id' => $packUnitId,
            ]);

            $productPackUnit->save();

            ProductService::cloneByPackUnit($model, PackUnit::findOne($packUnitId));
        }

        return $this->render('packs-units', compact('model'));
    }

    public
    function actionDownloadExampleFile()
    {
        $filePath = Yii::getAlias('@app') . '/import/example.xls';

        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($filePath));

        readfile($filePath);
        die;
    }

    public
    function actionGetPackUnits()
    {
        $response = ['success' => false];

        $productId = Yii::$app->request->post('productId');
        if ($productId) {
            $response['data'] = PackUnitService::getAllByProduct($productId);
            $response['success'] = true;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $response;
    }

    public
    function actionGetPackUnitsOnWarehouse()
    {
        $response = ['success' => false];

        $productId = Yii::$app->request->post('productId');
        $warehouseId = Yii::$app->request->post('warehouseId');

        if ($productId && $warehouseId) {
            $response['data'] = PackUnitService::getAllByProduct($productId, $warehouseId);
            $response['success'] = true;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $response;
    }

    public
    static function actionGetVariationByPackUnit()
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

    public
    function actionCheckAvailable()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['success' => true];

        $productId = Yii::$app->request->post('productId');
        $warehouseId = Yii::$app->request->post('warehouseId');

        $response['available'] = RemainsService::getAvailable($productId, $warehouseId);
        return $response;
    }

    public
    function actionSearchBySupplier($purchaseId, $q)
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

    public
    function actionSearchForPurchase($purchaseId, $q)
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
