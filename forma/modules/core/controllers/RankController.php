<?php

namespace forma\modules\core\controllers;

use Yii;
use forma\modules\core\records\Rank;
use forma\modules\core\records\RankSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RankController implements the CRUD actions for Rank model.
 */
class RankController extends Controller
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
     * Lists all Rank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/user-profile/rank/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/user-profile/rank/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rank();
        $model->loadDefaultValues(); //load default data from db

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $imageName = $model->imageFile->baseName . '.' . $model->imageFile->extension;
            if ($model->imageFile->saveAs('./img/user-profile/' . $imageName)) {
                $model->load(Yii::$app->request->post());
                $model->image = $imageName;
            }
            if ($model->save()) {
                return $this->redirect('index');
            } else {
                de('ПРОИЗОШЛА ОШИБКА');
            }

        } else {
            return $this->render('/user-profile/rank/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            if (!empty(UploadedFile::getInstance($model, 'imageFile'))) {
                unlink('./img/user-profile/' . $model->image);
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $imageName = $model->imageFile->baseName . '.' . $model->imageFile->extension;
                if ($model->imageFile->saveAs('./img/user-profile/' . $imageName)) {
                    $model->image = $imageName;
                }
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/user-profile/rank/view', 'id' => $model->id]);
        } else {
            return $this->render('/user-profile/rank/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/user-profile/rank/index']);
    }

    /**
     * Finds the Rank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
