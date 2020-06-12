<?php

namespace forma\modules\product\controllers;

use forma\modules\product\records\Field;
use forma\modules\product\records\FieldSearch;
use forma\modules\product\records\FieldValue;
use forma\modules\product\records\FieldValueSearch;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) {
                echo json_encode(['recordId' => $model->id, 'recordName' => $model->name]);
                die;
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
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
            if ($nameWidgetField == 'widgetMultiSelect' || $nameWidgetField == 'widgetDropDownList' || $nameWidgetField == 'widgetTypeahead') {
                return $this->render('field_widget', [
                    'nameWidgetField' => $nameWidgetField,
                ]);
            }
        }
        $model = $this->findModel($id);
        $field = new Field();
        $currentCategoryId = $model->id;

        $subCategoriesId = $this->getDropDownListPossibleCategories($currentCategoryId);

        $searchModel = new FieldSearch();
        $searchModel->category_id = $model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($field->load(Yii::$app->request->post()) && $field->save()) {
            $post = $_POST;
            if (isset($post['FieldValue'])) {
                foreach ($post['FieldValue'] as $key => $fieldValue) {
                    if (!empty($fieldValue['name'])) {
                        $fieldValueModel = new FieldValue();
                        $fieldValueModel->field_id = $field->id;
                        $fieldValueModel->name = $fieldValue['name'];
                        if (isset($post['FieldValueRadioButton']) && $post['FieldValueRadioButton'] == $key) {
                            $fieldValueModel->is_main = '1';
                        }
                        if (!$fieldValueModel->validate()) {
                            $fieldValueModel->errors;
                            var_dump($fieldValueModel->errors);
                            die();
                        }
                        $fieldValueModel->save();
                    }
                }
            }
            return $this->redirect('update?id=' . $id);

        } elseif ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        if (!empty($parentCategoryId = $model->parent_id)) {

            $parentsCategoriesId = $this->getParentCategoryId($parentCategoryId);

            $searchParentField = new FieldSearch();
            $parentFieldDataProvider = $searchParentField
                ->searchAllFieldsParentCategory(Yii::$app->request->queryParams, $parentsCategoriesId);

            return $this->render('update', [
                'model' => $model,
                'field' => $field,
                'subCategoriesId' => $subCategoriesId,
                'searchParentField' => $searchParentField,
                'parentFieldDataProvider' => $parentFieldDataProvider,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->render('update', [
            'model' => $model,
            'field' => $field,
            'subCategoriesId' => $subCategoriesId,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function getParentCategoryDataProvider($parentCategoryId)
    {
        $searchParentField = new FieldSearch();
        $searchParentField->category_id = $parentCategoryId;
        $parentFieldDataProvider = $searchParentField->search(Yii::$app->request->queryParams);

        return $parentFieldDataProvider;
    }

    public function getDropDownListPossibleCategories($currentCategoryId)
    {
        $allSubCategoriesId = [];
        $subCategories = Category::find()->andWhere(['parent_id' => $currentCategoryId])->all();// массив обьектов
        while (!empty($subCategories)) {
            $subCategories2 = Category::find();
            foreach ($subCategories as $subCategory) {
                $allSubCategoriesId [] = $subCategory->id;
                $subCategories2 = $subCategories2->orWhere(['parent_id' => $subCategory->id]);
            }
            $subCategories = $subCategories2->all();
        }
        return $allSubCategoriesId;
    }

    public function getParentCategoryId($parentCategoryId)
    {
        $parentsCategoriesId = [];
        while (!is_null($parentCategoryId) && !empty($parentCategoryId)) {
            $categoryModel = Category::findOne($parentCategoryId);
            if (!is_null($categoryModel)) {
                $parentCategoryId = $categoryModel->parent_id;
                $parentsCategoriesId [] = $categoryModel->id;
            } else {
                $parentCategoryId = null;
            }
        }
        return $parentsCategoriesId;
    }

    public function actionPjaxParentCategoryField()
    {
        if (Yii::$app->request->isPjax) {
            $this->layout = false;
            $parentCategoryId = $_POST['Category']['parent_id'];
            if (empty($parentCategoryId)) {
                return ' ';
            }

            $parentsCategoriesId = $this->getParentCategoryId($parentCategoryId);

            $searchParentField = new FieldSearch();
            $parentFieldDataProvider = $searchParentField->searchAllFieldsParentCategory(Yii::$app->request->queryParams, $parentsCategoriesId);
            $thisParentGrid = true;
            echo 'Характеристики родительской категории';
            return $this->render('setting_widget', [
                'thisParentGrid' => $thisParentGrid,
                'searchModel' => $searchParentField,
                'dataProvider' => $parentFieldDataProvider,
            ]);
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
