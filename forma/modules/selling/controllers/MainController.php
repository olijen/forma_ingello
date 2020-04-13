<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\selling\Selling;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use forma\modules\selling\services\SellingService;

/**
 * Default controller for the `transit` module
 */
class MainController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update', 'createByRemains', 'delete', 'showSelling'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['showSelling',],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'update', 'createByRemains', 'delete', 'showSelling', ],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = SellingService::search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionUpdate($id)
    {
        $this->redirect(Url::to(['/selling/form', 'id' => $id]));
    }

    public function actionCreateByRemains()
    {
        $selling = SellingService::createByRemains(Yii::$app->request->post());
        return $this->redirect(['/selling/form/index', 'id' => $selling->id]);
    }

    public function actionDelete($id)
    {
        SellingService::delete($id);
        $this->redirect('index');
    }

    public function actionShowSelling(){
        echo "hahhahahaah eto pokazyvajet selling";
        $selling_token = null;
        if(isset($_GET['selling_token'])) $selling_token = $_GET['selling_token'];
        $model = new Selling();
        $a = $model::findOne(['selling_token'=>$selling_token]);
        var_dump($a);
    }
}
