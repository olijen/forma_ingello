<?php

namespace forma\modules\product\controllers;

use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\Field;
use forma\modules\product\records\FieldSearch;
use forma\modules\product\records\FieldValue;
use forma\modules\product\records\FieldValueSearch;
use forma\modules\product\services\FieldValueService;
use Yii;
use forma\modules\product\records\Category;
use forma\modules\product\records\CategorySearch;
use yii\helpers\Html;
use yii\validators\Validator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $possibleCategories = Category::getPossibleCategories();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) {
                echo json_encode(['recordId' => $model->id, 'recordName' => $model->name]);
                die;
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'possibleCategories' => $possibleCategories,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->isPjax) {
            $this->layout = false;
            $nameWidgetField = $_POST['Field']['widget'];
            if (SystemWidget::manyValuesWidgets($nameWidgetField)) {
                return $this->render('field_widget', [
                    'nameWidgetField' => $nameWidgetField,
                ]);
            }
        }
        $model = $this->findModel($id);
        $field = new Field();
        $currentCategoryId = $model->id;

        $subCategoriesId = Category::getDropDownListPossibleCategories($currentCategoryId);
        $possibleCategories = Category::getPossibleCategories($subCategoriesId, $currentCategoryId);
        $fieldValuesNameFilterArray = FieldValueService::getFieldValuesNameFilterArray($currentCategoryId);

        $searchModel = new FieldSearch();
        $searchModel->category_id = $model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->fieldLoadAndSave($field, $model->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $allFieldValue = FieldValueService::getFieldValue();
        $renderVar = [];
        if (!empty($parentCategoryId = $model->parent_id)) {
            $parentProviderAndSearch = Category::getParentFieldDataProviderAndParentFieldSearch($parentCategoryId);
            $parentFieldValuesNameFilterArray = FieldValueService::getFieldValuesNameFilterArray($parentCategoryId);
            $renderVar = array_merge($parentProviderAndSearch,
                ['parentFieldValuesNameFilterArray' => $parentFieldValuesNameFilterArray]);
        }
        $renderVar = array_merge($renderVar, [
            'model' => $model,
            'field' => $field,
            'subCategoriesId' => $subCategoriesId,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allFieldValue' => $allFieldValue,
            'fieldValuesNameFilterArray' => $fieldValuesNameFilterArray,
            'possibleCategories' => $possibleCategories,
        ]);

        return $this->render('update', $renderVar);

    }

    public function fieldLoadAndSave($field, $categoryId)
    {
        if ($field->load(Yii::$app->request->post()) && $field->save()) {
            $post = $_POST;
            if (isset($post['FieldValue'])) {
                FieldValueService::eachFieldValueForCreate($post['FieldValue'], $field->id, $post);
            }
            return $this->redirect('update?id=' . $categoryId);
        }
    }

    public function actionPjaxParentCategoryField()
    {
        if (Yii::$app->request->isPjax) {
            $this->layout = false;
            $parentCategoryId = $_POST['Category']['parent_id'];
            if (empty($parentCategoryId)) {
                return ' ';
            }
            $thisParentGrid = true;
            $parentProviderAndSearch = Category::getParentFieldDataProviderAndParentFieldSearch($parentCategoryId);
            $allFieldValue = FieldValueService::getFieldValue();
            $parentFieldValuesNameFilterArray = FieldValueService::getFieldValuesNameFilterArray($parentCategoryId);
            $renderVar = array_merge(['allFieldValue' => $allFieldValue, 'thisParentGrid' => $thisParentGrid, 'parentFieldValuesNameFilterArray' => $parentFieldValuesNameFilterArray]
                , $parentProviderAndSearch);


            return $this->render('setting_widget', $renderVar);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
