<?php

namespace forma\modules\core\controllers;

use forma\assets\AppAsset;
use forma\modules\core\records\Rank;
use forma\modules\core\records\UploadForm;
use Yii;
use forma\modules\core\records\UserProfile;
use forma\modules\core\records\UserProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $currenUser = UserProfile::find()->where(['user_id' => Yii::$app->user->id])->joinWith(['userProfileRules'])->one();
        $ranks = Rank::find()->joinWith(['rules'])->all();
        return $this->render('/user-profile/userprofile/index', [
            'ranks' => $ranks,
            'currenUser' => $currenUser
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
        $modelUpload = new UserProfile();
        $model = new UserProfile();
        if(Yii::$app->request->isPost){
            $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');
            $fileName = $modelUpload->imageFile->baseName .'_'.time().date('Y-m-d'). '.' . $modelUpload->imageFile->extension;
            if ($modelUpload->imageFile
                ->saveAs('./img/user-profile/' . $fileName)) {
                $model->image = $fileName;
                $model->user_id = $_POST['UserProfile']['user_id'];
                $model->rank_id = Rank::find()->where(['name'=>'Новичок'])->one()->id;
                if($model->save()){
                    return $this->redirect(['/user-profile/userprofile/view', 'id' => $model->id]);
                }
            }
        }
        else{
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
