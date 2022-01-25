<?php

namespace forma\modules\core\controllers;

use forma\modules\core\forms\SignupForm;
use forma\modules\core\records\Accessory;
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
        $icons = array_slice((new \ReflectionClass(FontAwesome::class))->getConstants(), 21, -1);
        if (!empty($currenUser)) {
            $ranks = Rank::find()->joinWith(['rules'])->allAccessory();
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
            if (isset($modelUpload->imageFile)) {
                $fileName = $modelUpload->imageFile->baseName . '_' . time() . date('Y-m-d') . '.' . $modelUpload->imageFile->extension;
                if ($modelUpload->imageFile
                    ->saveAs('./img/user-profile/' . $fileName)) {
                    $model->image = $fileName;
                    $model->user_id = Yii::$app->user->id;
                    if ($model->save()) {
                        return $this->redirect('/core/user-profile/');
                    }
                }
            } else {
                $model->user_id = Yii::$app->user->id;
                if ($model->save()) {
                    return $this->redirect('/core/user-profile/');
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
        $model = $this->findModel($id);
        if (isset($model->image)) {
            unlink('./img/user-profile/' . $model->image);
            $model->delete();
        } else {
            $model->delete();
        }
        return $this->redirect(['/core/userprofile/index']);
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

    /**
     * @return false|string|void
     * Метод записи пульсации на открытый элемент, через cookie
     */
    public function actionResetCookie()
    {
        $cookies = Yii::$app->request->cookies;
        if (isset($cookies['array-pulsate'])) {
            $newArrayCookie = [];
            $delete = '';
            foreach ($cookies['array-pulsate']->value as $item) {
                if ($item != Yii::$app->request->post('key')) {
                    $newArrayCookie [] = $item;
                } else {
                    $delete = $item;
                }
            }
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'array-pulsate',
                'value' => $newArrayCookie,
            ]));
            return json_encode($delete);
        }
    }

    /**
     * @return \yii\web\Response
     * Метод перезаписи таблицы доступ к интерфейсам
     */
    public function actionResetItemInterface()
    {
        $accessInterface = Yii::$app->params['access-interface'];
        foreach ($accessInterface as $module => $keys) {
            foreach ($keys as $keyInId => $key) {
                $newItemInterface = new ItemInterface();
                $newItemInterface->module = $module;
                $newItemInterface->key = $keyInId;
                $newItemInterface->save();
            }
        }
        return $this->redirect('/core/user-profile');
    }

    /**
     * @return void|\yii\web\Response
     * @throws \Exception
     * Метод создания  игрового профиля с такими данными (Регламенты, Элементы, Правила, Ранги, Элементы доступа)
     */
    public function actionCreateGameProfile()
    {
        $model = new SignupForm();
        $model->username = 'Game profile';
        $model->email = random_int(0, 999999) . 'game@game.game';
        $model->password = random_int(0, 999999) . '111111';
        $infoProfile = 'Логин: ' . $model->email . '; Пароль: ' . $model->password;
        if ($model->signup()) {
            $userProfile = new UserProfile();
            $userProfile->user_id = Yii::$app->user->identity->getId();
            if ($userProfile->save()) {
                $cookies = Yii::$app->response->cookies;
                $cookies->add(new \yii\web\Cookie([
                    'name' => 'info-profile',
                    'value' => $infoProfile,
                ]));
                return $this->goHome();
            }
        }
    }

    public function actionFilterChart()
    {
//        de($_POST);
        if (isset ($_POST['from_date']) && isset ($_POST['to_date'])) {
            $dateFrom = $_POST['from_date'];
            $dateTo = $_POST['to_date'];
            $model = UserProfileRule::find()->where(['between', 'date', "$dateFrom", "$dateTo"])->all();
//        de($model);
//            $query->andFilterWhere(['between', 'date', $dateFrom, $dateTo]);
        }
//        de($model);
    }
}
