<?php

namespace forma\modules\core\controllers;

use forma\modules\core\records\Rank;
use Yii;
use forma\modules\core\records\UserProfile;
use forma\modules\core\records\UserProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserProfileController implements the CRUD actions for UserProfile model.
 */
class UserProfileController extends Controller
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
     * Lists all UserProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'public';
        $currenUser = UserProfile::find()->where(['id'=>Yii::$app->user->id])->one();
//        $userRank = $currenUser->rank;
//        $needCountRule = $userRank;
        //dd($userRank);

        return $this->render('/user-profile/userprofile/index', [
        ]);
    }

    /**
     * Displays a single UserProfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/user-profile/userprofile/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserProfile();
        $model->loadDefaultValues(); //load default data from db

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/user-profile/userprofile/view', 'id' => $model->id]);
        } else {
            return $this->render('/user-profile/userprofile/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/user-profile/userprofile/view', 'id' => $model->id]);
        } else {
            return $this->render('/user-profile/userprofile/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserProfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/user-profile/userprofile/index']);
    }
    public function actionRankProcess()
    {
        return $this->render('/user-profile/userprofile/rank-process', [

        ]);
    }
    public function actionChartProcessRank()
    {
        return $this->render('/user-profile/userprofile/chart-process-rank', [

        ]);
    }

    /**
     * Finds the UserProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
