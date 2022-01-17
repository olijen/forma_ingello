<?php

namespace forma\modules\core\controllers;

use Yii;
use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\ItemInterfaceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemInterfaceController implements the CRUD actions for ItemInterface model.
 */
class ItemInterfaceController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ItemInterface models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemInterfaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/user-profile/item-interface/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     *
     *
     * Displays a single ItemInterface model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/user-profile/item-interface/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ItemInterface model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemInterface();
        $model->loadDefaultValues(); //load default data from db

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/user-profile/item-interface/view', 'id' => $model->id]);
        } else {
            return $this->render('/user-profile/item-interface/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ItemInterface model.
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
            return $this->render('/user-profile/item-interface/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ItemInterface model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/user-profile/item-interface/index']);
    }

    /**
     * Finds the ItemInterface model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItemInterface the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemInterface::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
