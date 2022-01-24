<?php

namespace forma\modules\core\controllers;

use forma\modules\core\records\UserProfileRule;
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
     * Updates an existing ItemInterface model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldModel = $model;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($oldModel->module != $model->module || $oldModel->key != $model->key) {
                foreach ($model->rank->rules as $rule) {
                    foreach ($rule->userProfileRules as $userProfileRule) {
                        $userProfileRule->user->userProfile->rank_id = null;
                        $userProfileRule->user->userProfile->save();
                        $userProfileRule->delete();
                    }
                }
            }
            return $this->redirect('/core/item-interface');
        } else {
            return $this->render('/user-profile/item-interface/update', [
                'model' => $model,
            ]);
        }
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
