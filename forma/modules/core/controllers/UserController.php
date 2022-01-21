<?php

namespace forma\modules\core\controllers;

use forma\modules\core\components\UserIdentity;
use forma\modules\core\records\UserProfile;
use Yii;
use forma\modules\core\records\User;
use forma\modules\core\records\UserSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'view', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User records.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity->role == 'admin') {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new NotFoundHttpException();
        }

    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUpload = $model->userProfile;
        $modelUser = UserProfile::find()->where(['user_id'=>$model->id])->one();
        if (Yii::$app->request->isPost) {
            if (!empty(UploadedFile::getInstance($modelUpload, 'imageFile'))) {
                if (isset($model->userProfile->image)) {
                    unlink('./img/user-profile/' . $model->userProfile->image);
                }
                $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');
                $fileName = $modelUpload->imageFile->baseName . '_' . time() . date('Y-m-d') . '.' . $modelUpload->imageFile->extension;
                if ($modelUpload->imageFile
                    ->saveAs('./img/user-profile/' . $fileName)) {
                    $modelUser->image = $fileName;
                }
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save() && $modelUser->save()) {
            $this->redirect('/core/user-profile');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionImpersonate($id)
    {
        $user = UserIdentity::findIdentity($id);
        if ($user) {
            Yii::$app->user->login($user);
            return $this->redirect('all-users');

        }

    }

    public function actionUnimpersonate()
    {
        if (Yii::$app->request->cookies->getValue('Admin') === md5('goBack')) {
            $user = UserIdentity::findIdentity(1);
            if ($user) {
                Yii::$app->user->login($user);
                return $this->redirect('/#');
            }
        }

    }


    public function actionReferral()
    {
        $query = User::find()->where(['parent_id' => Yii::$app->user->id]);
        $searchModel = new UserSearch();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $provider,
        ]);
    }


    public function actionAllUsers()
    {
//        de(Yii::$app->request->cookies->getValue('Admin'));
        if (Yii::$app->user->id !== 1) {
            return $this->redirect('referral');

        }
        $query = User::find()->where(['!=', 'id', 1]);
        $searchModel = new UserSearch();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $provider,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
