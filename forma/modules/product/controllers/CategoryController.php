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

        $searchModel = new FieldValueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) {
                echo json_encode(['recordId' => $model->id, 'recordName' => $model->name]);
                die;
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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
//        de(Yii::$app->request->post());
        $model = $this->findModel($id);
        $field = new Field();
        $fieldValue = new FieldValue();

        $searchModel = new FieldSearch();
        $searchModelValue = new FieldValueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ($field->load(Yii::$app->request->post()) && $field->category_id && $field->save()) {
                de('ne tak');
                return $this->redirect('update?id=' . $id);
            } elseif (!$field->save()) {
                var_dump($id);
                var_dump($field->errors);
                 $field->errors;
                return $this->redirect('update?id=' . $id);
            }

        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['index']);
//        } else {
        return $this->render('update', [
            'model' => $model,
            'field' => $field,
            'fieldValue' => $fieldValue,
            'searchModel' => $searchModel,
            'searchModelValue' => $searchModelValue,
            'dataProvider' => $dataProvider,
        ]);
//        }
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
