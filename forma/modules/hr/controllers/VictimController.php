<?php

namespace forma\modules\hr\controllers;

use forma\components\Controller;
use forma\modules\hr\records\victim\Victim;
use forma\modules\hr\records\victim\VictimSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\httpclient\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * VictimController implements the CRUD actions for Victim model.
 */
class VictimController extends Controller
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
     * Lists all Victim models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->post('hasEditable')) {
            $requestPost = Yii::$app->request->post();

            $victimId = $requestPost['editableKey'];
            $victimColumn = $requestPost['editableAttribute'];
            $victimData = $requestPost['Victim'][array_key_first($requestPost['Victim'])][$victimColumn];

            $victimUpdate = Victim::find()->where(['id' => $victimId])->one();

            if ($victimUpdate->$victimColumn != $victimData) {
                $victimUpdate->$victimColumn = $victimData;
                if ($victimUpdate->validate() && $victimUpdate->save()) {
                    $data = ['output' => [$victimData]];
                    return json_encode($data);
                }
            } else {
                $data = ['output' => [$victimUpdate->$victimColumn]];
                return json_encode($data);
            }
        }

        $searchModel = new VictimSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $hexMin = 0;
        $hexMax = 9;

        $victim = Victim::find()->select(['id', 'fullname'])->all();

        $arrayVictimColor = array();
        foreach ($victim as $attributeVictim) {
            foreach ($victim as $attributeVictimSearch) {
                if (explode(' ', $attributeVictim->fullname)[0] == explode(' ', $attributeVictimSearch->fullname)[0]
                    && $attributeVictim->id != $attributeVictimSearch->id) {
                    if (!empty($arrayVictimColor)) {
                        foreach ($arrayVictimColor as $key => $item) {
                            if ($key != explode(' ', $attributeVictim->fullname)[0]) {
                                $arrayVictimColor [explode(' ', $attributeVictim->fullname)[0]] = '#' . mt_rand($hexMin, $hexMax)
                                    . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax)
                                    . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax);

                            }
                        }
                    } else {
                        $arrayVictimColor [explode(' ', $attributeVictim->fullname)[0]] = '#' . mt_rand($hexMin, $hexMax)
                            . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax)
                            . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax);
                    }
                }
            }
        }

        if ($victimId = Yii::$app->request->get('id')) {
            $victim = $this->findModel($victimId);

            if ($victim->load(Yii::$app->request->post()) && $victim->save()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                $data = ['output' => $victim->getAttributes(), 'success' => true];

                return $data;
            } else {
                return false;
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayVictimColor' => $arrayVictimColor,
        ]);
    }

    /**
     * Displays a single Victim model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Victim model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Victim();
        $model->loadDefaultValues(); //load default data from db

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->how_many > 1) {
                for ($i = 1; $i < $model->how_many; $i++) {
                    $modelChild = new Victim();
                    $modelChild->loadDefaultValues();
                    $modelChild->stay_for = $model->stay_for;
                    $modelChild->phone = $model->phone;
                    $modelChild->specialization = '-';
                    $modelChild->destination = $model->destination;
                    $modelChild->save();
                }
            }

            return $this->redirect('/hr/volunteer/index?how_many=' . $model->how_many . '&support_type=' . 0);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Victim model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Victim model.
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
     * Finds the Victim model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Victim the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Victim::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
