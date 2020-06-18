<?php

namespace forma\modules\product\controllers;

use forma\modules\product\records\FieldProductValue;
use forma\modules\product\records\FieldValue;
use Yii;
use forma\modules\product\records\Field;
use forma\modules\product\records\FieldSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FieldController implements the CRUD actions for Field model.
 */
class FieldController extends Controller
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
     * Lists all Field models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FieldSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Field model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Field model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Field();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Field model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($post = Yii::$app->request->post()) {
            if (isset($post['Field'])) {
                $postField = $post['Field'];
                $fieldId = $postField['id'];
                $fieldModel = Field::findOne($fieldId);

                if ($post['Field']['widget'] == 'widgetDropDownList' || $post['Field']['widget'] == 'widgetMultiSelect'|| $post['Field']['widget'] == 'widgetTypeahead') {
                    $fieldModel->defaulted = null;
                    $fieldModel->widget = $post['Field']['widget'];
                    $fieldModel->name = $postField['name'];
                    $fieldModel->save();
                    if (isset($post['FieldValueNew'])) {
                        foreach ($post['FieldValueNew'] as $key => $fieldValue) {
                            if (!empty($fieldValue['name'])) {
                                $fieldValueModel = new FieldValue();
                                $fieldValueModel->field_id = $fieldId;
                                $fieldValueModel->name = $fieldValue['name'];
                                if (isset($post['FieldValueRadioButton']) && $post['FieldValueRadioButton'] == $key) {
                                    $fieldValueModel->is_main = '1';
                                }elseif(isset($fieldValue['is_main']) && $fieldValue['is_main'] == 1){
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
                    if ($fieldModel->widget == 'widgetDropDownList' || $fieldModel->widget == 'widgetMultiSelect' || $fieldModel->widget == 'widgetTypeahead' ) {
                        if (isset($post['FieldValue'])) {
                            foreach ($post['FieldValue'] as $fieldValueId => $fieldValue) {

                                if (!empty($fieldValue['name'])) {
                                    $fieldValueModel = FieldValue::findOne($fieldValueId);
                                    $fieldValueModel->name = $fieldValue['name'];

                                    if (isset($post['FieldValueRadioButton']) && $post['FieldValueRadioButton'] == $fieldValueId){
                                        $fieldValueModel->is_main = 1;
                                    }else{
                                        $fieldValueModel->is_main = 0;
                                    }
                                    if(isset($fieldValue['is_main']) && $fieldValue['is_main'] == 1){
                                        $fieldValueModel->is_main = '1';
                                    }
                                    if (!$fieldValueModel->validate()) {
                                        $fieldValueModel->errors;
                                        var_dump($fieldValueModel->errors);
                                        die();
                                    }
                                    $fieldValueModel->save();
                                } else {
                                    FieldValue::deleteAll(['id = ' . $fieldValueId]);
                                }
                            }
                        }
                    }
                } else {
                    FieldValue::deleteAll(['field_id = ' . $fieldId]);
                    FieldProductValue::deleteAll(['field_id = ' . $fieldId]);
                    $fieldModel = Field::findOne($postField['id']);
                    $fieldModel->widget = $postField['widget'];
                    $fieldModel->name = $postField['name'];
                    $fieldModel->defaulted = $postField['defaulted'];
                    if (!$fieldModel->validate()) {
                        $fieldModel->errors;
                        var_dump($fieldModel->errors);
                        die();
                    }
                    $fieldModel->save();
                }
                return $this->redirect(['category/update?id=' . $fieldModel->category_id]);
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $fieldId = $model->category_id;
            return $this->redirect(['category/update?id=' . $fieldId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionGetFieldValuePjax()
    {
        if (Yii::$app->request->isPjax) {
            $this->layout = false;
            $post = $_POST;
            $fieldId = $post['id'];
            $model = Field::findOne($fieldId);
            $model->widget = $post['Field']['widget'];
            return $this->render('field_value', [
                'model' => $model,
            ]);


        }
    }

    /**
     * Deletes an existing Field model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $fieldId = $model->category_id;
        $model->delete();

        return $this->redirect(['category/update?id=' . $fieldId]);
    }

    /**
     * Finds the Field model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Field the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Field::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
