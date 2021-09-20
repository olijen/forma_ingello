<?php

namespace forma\modules\inventorization\controllers;

use Yii;
use forma\modules\inventorization\records\InventorizationProduct;
use forma\modules\inventorization\records\InventorizationProductSearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventorizationProductController implements the CRUD actions for InventorizationProduct model.
 */
class InventorizationProductController extends Controller
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
     * Lists all InventorizationProduct records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventorizationProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InventorizationProduct model.
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
     * Creates a new InventorizationProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InventorizationProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $inventorizationId = $model->inventorization->id;
            return $this->redirect(['/inventorization/inventorization/view', 'id' => $inventorizationId]);
        } else {
            $inventorizationId = Yii::$app->request->get('inventorization_id');
            return $this->render('create', compact('model', 'inventorizationId'));
        }
    }

    /**
     * Updates an existing InventorizationProduct model.
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
     * Deletes an existing InventorizationProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $inventorizationId = $model->inventorization->id;

        $model->delete();

        return $this->redirect(['/inventorization/inventorization/view', 'id' => $inventorizationId]);
    }

    /**
     * Finds the InventorizationProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InventorizationProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InventorizationProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
