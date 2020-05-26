<?php

namespace forma\modules\product\controllers;

use forma\modules\product\records\Field;
use forma\modules\product\records\FieldSearch;
use forma\modules\product\records\FieldValue;
use forma\modules\product\records\FieldValueSearch;
use Yii;
use forma\modules\product\records\Category;
use forma\modules\product\records\CategorySearch;
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
//de($dataProvider->getModels());
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
            if ($nameWidgetField == 'widgetMultiSelect' || $nameWidgetField == 'widgetDropDownList') {
                return $this->render('field_widget', [
                    'nameWidgetField' => $nameWidgetField,
                ]);
            }
        }
        $model = $this->findModel($id);
        $field = new Field();

        $searchModel = new FieldSearch();
        $searchModel->category_id = $model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($field->load(Yii::$app->request->post()) && $field->save()) {
            if(isset($_POST['FieldValue'])){
                foreach ($_POST['FieldValue'] as $value) {
                    if (!empty($value['name'])){
                        $fieldValue = new FieldValue();
                        $fieldValue->field_id = $field->id;
                        $fieldValue->name = $value['name'];
                        if (isset($value['is_main']) && $value['is_main'] == 'on'){
                            $fieldValue->is_main = '1';
                        }
                        if (!$fieldValue->validate()) {
                            $fieldValue->errors;
                            de($fieldValue->errors);
                        }
                        $fieldValue->save();
                    }
                }
            }
            return $this->redirect('update?id=' . $id);

        } elseif ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        if (!empty($parentCategoryId = $model->parent_id)){
            $searchParentField = new FieldSearch();
            $searchParentField->category_id = $model->parent_id;
            $parentFieldDataProvider = $searchParentField->search(Yii::$app->request->queryParams);

            return $this->render('update', [
                'model' => $model,
                'field' => $field,
                'searchParentField' => $searchParentField,
                'parentFieldDataProvider' => $parentFieldDataProvider,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->render('update', [
            'model' => $model,
            'field' => $field,
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

    public function actionPjaxParentCategoryField()
    {
        if (Yii::$app->request->isPjax) {
            $this->layout = false;
            $parentCategoryId = $_POST['Category']['parent_id'];
            $searchParentField = new FieldSearch();
            $searchParentField->category_id = $parentCategoryId;
            $parentFieldDataProvider = $searchParentField->search(Yii::$app->request->queryParams);

            return $this->render('parent_field', [
                'searchParentField' => $searchParentField,
                'parentFieldDataProvider' => $parentFieldDataProvider,
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
