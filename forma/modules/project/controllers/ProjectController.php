<?php

namespace forma\modules\project\controllers;

use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\project\records\projectuser\ProjectUser;
use Yii;
use forma\modules\project\records\project\Project;
use forma\modules\project\records\project\ProjectSearch;
use forma\components\Controller;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    /**
     * {@inheritdoc}
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => '/images/', // Directory URL address, where files are stored.
                'path' => $_SERVER['DOCUMENT_ROOT'] . '/images', // Or absolute path to directory where files are stored.
                'validatorOptions' => [
                    'maxWidth' => 1748,
                    'maxHeight' => 1240,
                    ],
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetFilesAction',
                'url' => '/images/', // Directory URL address, where files are stored.
                'path' => $_SERVER['DOCUMENT_ROOT'] . '/images', // Or absolute path to directory where files are stored.
                'type' => '0',
            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetFilesAction',
                'url' => '/images/', // Directory URL address, where files are stored.
                'path' => $_SERVER['DOCUMENT_ROOT'] . '/images', // Or absolute path to directory where files are stored.
                'type' => '1',//GetAction::TYPE_FILES,
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => '/images/', // Directory URL address, where files are stored.
                'path' => $_SERVER['DOCUMENT_ROOT'] . '/images', // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false,
                'translit' => true,
                'validatorOptions' => [
                    'maxSize' => 400000
                ]
            ],
        ];
    }

    /**
     * Lists all Project records.
     * @return mixed
     */
    public function actionChangeState($id, $state)
    {
        $model = Project::forceAccessToOne(['id'=>$id]);
        $model->state = $state;
        if (!$model->save()) {
            echo var_dump($model, $model->getErrors()); exit;
        }

        return $this->actionIndex();
    }

    /**
     * Lists all Project records.
     * @return mixed
     */
    public function actionIndex()
    {
        $order = InterviewState::find()->max('`order`');
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //Yii::debug($dataProvider->getModels());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'orderState' => $order
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }



        return $this->render('view', [
            'model' => Project::getAccessToOne(['id'=>$id]),
        ]);

    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }

        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['id' => $model->id, 'name' => $model->name];
            }
            if (Yii::$app->request->get('r') == 't') {
                return $this->redirect(Url::previous('vacancy'));
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model =  Project::getAccessToOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Project::getAccessToOne(['id' => $id])->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::getAccessToOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
