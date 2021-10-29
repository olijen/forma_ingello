<?php

namespace forma\modules\core\controllers;

use forma\modules\core\records\Regularity;
use forma\modules\core\records\Rule;
use forma\modules\core\records\User;
use Yii;
use forma\modules\core\records\AccessInterface;
use forma\modules\core\records\AccessInterfaceSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccessInterfaceController implements the CRUD actions for AccessInterface model.
 */
class AccessInterfaceController extends Controller
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
     * Lists all AccessInterface models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccessInterfaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccessInterface model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $accessInterface =$this->findModel($id);
        $rule = Rule::find()->where(['id'=>$accessInterface->rule_id])->one();
        $user = User::find()->where(['id'=>$accessInterface->user_id])->one();
        return $this->render('view', [
            'model' => $accessInterface,
            'rule'=>$rule,
            'user'=>$user,
        ]);
    }

    /**
     * Creates a new AccessInterface model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AccessInterface();
        $model->loadDefaultValues(); //load default data from db
        $rules =  ArrayHelper::map(Rule::find()
            ->select(['id', 'rule_name'])
            ->all(), 'id', 'rule_name');
        $user = User::find()->where(['id'=>$model->user_id])->select(['id','parent_id','email'])->one();
        $usersParent = User::find()->where(['parent_id'=>$model->user_id])->select(['id','parent_id','email'])->all();
        $usersParent[] = $user;
        $users = ArrayHelper::map($usersParent,'id','email');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'rules' =>$rules,
                'users' =>$users,
            ]);
        }
    }

    /**
     * Updates an existing AccessInterface model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $rules =  ArrayHelper::map(Rule::find()
            ->select(['id', 'rule_name'])
            ->all(), 'id', 'rule_name');
        $user = User::find()->where(['id'=>$model->user_id])->select(['id','parent_id','email'])->one();
        $usersParent = User::find()->where(['parent_id'=>$model->user_id])->select(['id','parent_id','email'])->all();
        $usersParent[] = $user;
        $users = ArrayHelper::map($usersParent,'id','email');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'rules' =>$rules,
                'users' =>$users,
            ]);
        }
    }

    /**
     * Deletes an existing AccessInterface model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccessInterface model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AccessInterface the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccessInterface::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
