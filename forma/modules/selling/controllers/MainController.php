<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\selling\Selling;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use forma\modules\selling\services\SellingService;
use forma\modules\selling\records\state\State;
use forma\modules\customer\records\Customer;
use forma\modules\country\records\Country;

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
                'only' => ['showSelling'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['showSelling'],
                        'roles' => ['?', '@'],
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

        $this->layout = 'blank';

        $selling_token = null;
        if(isset($_GET['selling_token'])) $selling_token = $_GET['selling_token'];


        $selling = Selling::findOne(['selling_token'=>$selling_token]);
        $state = State::findOne(['id' => $selling->state_id]);
        $customer = $selling->customer;

        if(\Yii::$app->request->isPjax){
            $customer->chief_email = $_GET['Customer']['chief_email'];
            $customer->save();
            return $this->render('selling-info', compact('selling_token', 'selling', 'customer', 'state'));
        }

        return $this->render('selling-info', compact('selling_token', 'selling', 'customer', 'state'));
    }
}
