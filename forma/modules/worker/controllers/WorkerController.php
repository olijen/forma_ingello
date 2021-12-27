<?php

namespace forma\modules\worker\controllers;

use forma\modules\project\records\projectvacancy\ProjectVacancy;
use Yii;
use forma\modules\worker\records\Worker;
use forma\modules\worker\records\WorkerSearch;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * WorkerController implements the CRUD actions for Worker model.
 */
class WorkerController extends Controller
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

            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetFilesAction',
                'url' => '/images/', // Directory URL address, where files are stored.
                'path' => $_SERVER['DOCUMENT_ROOT'] . '/images', // Or absolute path to directory where files are stored.

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
     * Lists all Worker records.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Worker model.
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
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Worker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $projectVacancyId = Yii::$app->request->get('projectVacancyId');
        $vacancyId = ProjectVacancy::find()->where(['id'=>$projectVacancyId])->one()->vacancy_id;
        if (Yii::$app->request->isAjax) {
            $this->layout = '@app/modules/core/views/layouts/modal';
        }
        $model = new Worker();
        $model->scenario = 'fromForm';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['id' => $model->id, 'name' => $model->name];
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'vacancyId' => $vacancyId,
            ]);
        }
    }

    /**
     * Updates an existing Worker model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'fromForm';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'vacancyId' => null,
        ]);
    }

    /**
     * Deletes an existing Worker model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionAddWorker()
    {
        $path = \Yii::getAlias('@inst') ;
        $file = $path . '/instagram_service2.csv';
        if (($handle = fopen($file, "r")) !== FALSE) {
            $row = 1;
            while (($data = fgetcsv($handle, 1000)) !== FALSE) {
                $num = count($data);
                if ($row == 1) {
                    $row++;
                    continue;
                }
                $str = '';
                $vacancy_id = 86;
                foreach ($data as $k => $value) {
                    $str .= '\'' . $value . '\'' . ',';
                }
                $str = substr($str, 0, -1);
                $sql = "INSERT INTO worker (patronymic,surname,passport,experience_description) VALUES ($str)";
                $addWorker = Yii::$app->db->createCommand($sql)->execute();
                $id = Yii::$app->db->getLastInsertID();
                $entityClass = \forma\modules\worker\records\Worker::className();
                $userId = Yii::$app->user->id;
                $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('" . $entityClass . "','" . $id . "','" . $userId . "')" . ';' . '<br>';
                Yii::$app->db->createCommand($sqlAccessory)->execute();

                $sql = "INSERT INTO worker_vacancy (worker_id,vacancy_id) VALUES ($id,$vacancy_id)";
                Yii::$app->db->createCommand($sql)->execute();
                $id = Yii::$app->db->getLastInsertID();
                $entityClass = \forma\modules\worker\records\Worker::className()::className();
                $userId = Yii::$app->user->id;
                $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('" . $entityClass . "','" . $id . "','" . $userId . "')" . ';' . '<br>';
                Yii::$app->db->createCommand($sqlAccessory)->execute();
            }
            fclose($handle);
        }
        return $this->redirect('index');
    }

    /**
     * Finds the Worker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Worker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Worker::getAccessToOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
