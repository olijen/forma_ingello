<?php

namespace forma\modules\core\controllers;

use forma\modules\core\forms\SignupForm;
use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\Rank;
use forma\modules\core\records\Rule;
use forma\modules\core\records\User;
use forma\modules\core\records\UserProfileRule;
use rmrevin\yii\fontawesome\FontAwesome;
use Yii;
use forma\modules\core\records\UserProfile;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $currenUser = User::find()->joinWith(['userProfileRules'])->where(['user.id' => Yii::$app->user->id])->one();
        $icons = array_slice((new \ReflectionClass(FontAwesome::class))->getConstants(),21,-1);
        if (!empty($currenUser)) {
            $ranks = Rank::find()->joinWith(['rules'])->all();
            return $this->render('/user-profile/userprofile/index', [
                'ranks' => $ranks,
                'currenUser' => $currenUser,
                'icons' => $icons
            ]);
        } else {
            return $this->redirect(['/core/user-profile/create']);
        }

    }

    /**
     * Displays a single UserProfile model.
     * @param integer $id
     * @return mixed
     */

    public function actionCreate()
    {
        $modelUpload = new UserProfile();
        $model = new UserProfile();
        if (Yii::$app->request->isPost) {
            $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');
            $fileName = $modelUpload->imageFile->baseName . '_' . time() . date('Y-m-d') . '.' . $modelUpload->imageFile->extension;
            if ($modelUpload->imageFile
                ->saveAs('./img/user-profile/' . $fileName)) {
                $model->image = $fileName;
                $model->user_id = Yii::$app->user->id;
                if ($model->save()) {
                    return $this->redirect(['/user-profile/userprofile/view', 'id' => $model->id]);
                }
            }
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
        $modelUser = $model->user;
        return $this->redirect(['/core/user/update', 'id' => $modelUser->id]);
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

    public function actionGenerateGame(){
        $rankMasterCRM = new Rank();
        $rankMasterCRM->name = 'Мастер в CRM модуле';
        $rankMasterCRM->order = '2';
        $rankMasterCRM->image = 'stol.png';
        $rankMasterCRM->save();
        $accessInterfaceCRM = Yii::$app->params['access-interface']['СRM'];
        foreach ($accessInterfaceCRM as $key => $item){
            $newItemInterface = new ItemInterface();
            $newItemInterface->module ='CRM';
            $newItemInterface->key =$key;
            $newItemInterface->rank_id =$rankMasterCRM->id;
            $newItemInterface->save();

        }
    }
    public function actionCleanGame(){
        UserProfileRule::deleteAll();
        UserProfile::deleteAll();
        Rule::deleteAll();
        ItemInterface::deleteAll();
        Rank::deleteAll();
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

    public function actionGame()
    {
        Yii::$app->response->cookies->add(new Cookie([
            'name'=> 'user_game',
            'value'=> 'game'
        ]));

        $model = new SignupForm();
        $model->username= 'User game';
        $model->email= 'user@game.game';
        $model->password= '111111';
        if ($model->signup(true)) {
            return Yii::$app->response->redirect((['/core/regularity/regularity']));
        }

    }
}
