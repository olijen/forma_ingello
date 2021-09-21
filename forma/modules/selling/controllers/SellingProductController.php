<?php

namespace forma\modules\selling\controllers;

use Yii;
use forma\modules\selling\records\SellingProduct;
use forma\modules\selling\records\SellingProductSearch;
use yii\helpers\Url;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SellingProductController implements the CRUD actions for SellingProduct model.
 */
class SellingProductController extends Controller
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
     * Lists all SellingProduct records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SellingProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SellingProduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SellingProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SellingProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $sellingId = $model->selling->id;
            return $this->redirect(['/selling/selling/view', 'id' => $sellingId]);
        } else {
            $sellingId = Yii::$app->request->get('selling_id');
            return $this->render('create', compact('model', 'sellingId'));
        }
    }

    /**
     * Updates an existing SellingProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SellingProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $sellingId = $model->selling->id;

        $model->delete();

        return $this->redirect(['/selling/selling/view', 'id' => $sellingId]);
    }

    /**
     * Finds the SellingProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SellingProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SellingProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
