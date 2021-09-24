<?php

namespace forma\modules\selling\controllers;

use forma\modules\core\forms\LoginForm;
use forma\modules\core\forms\SignupForm;
use forma\modules\core\records\User;
use forma\modules\product\records\Product;
use forma\modules\selling\records\selling\Selling;
use Google_Client;
use Google_Service_Oauth2;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use forma\components\Controller;
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
        if (Yii::$app->request->isAjax) Yii::debug('ВОТ');
        $searchModel = SellingService::search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //Yii::debug("PROVIDER ON PAGE");
        //Yii::debug($dataProvider);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionUpdate($id)
    {

        $redirectLink = '/selling/form?id='.$id;
        //$parameters = ['id' => $id];
        if (isset($_GET['without-header'])) $redirectLink .='&without-header';
        //$this->redirect(Url::to(['/selling/form', $parameters]));
        $this->redirect($redirectLink);
    }

    public function actionCreateByRemains()
    {
        $customer = Customer::getModelByUser('forma\modules\customer\records\Customer', User::findOne(Yii::$app->user->id), true);

        $sellingData = array_merge(Yii::$app->request->post(), ['customer' => $customer]);
        $selling = SellingService::createByRemains($sellingData);
        return $this->redirect(['/selling/form/index', 'id' => $selling->id]);
    }

    public function actionDelete($id)
    {
        SellingService::delete($id);
        $this->redirect('index');
    }
    public function actionDeleteSelection()
    {
        $selection = Yii::$app->request->post('selection');

        if ($selection) {
            Selling::deleteAll(['IN', 'id', $selection]);
        }

        return $this->redirect('/selling/main/index');
    }

    public function actionShowSelling(){

        //$this->layout = 'blank';
        $selling_token = null;
        if(isset($_GET['selling_token'])){
            $selling_token = $_GET['selling_token'];
            setcookie('selling_token', $selling_token, time()+36000);
        } else if(isset($_COOKIE['selling_token'])){
            $selling_token = $_COOKIE['selling_token'];
            $_GET['selling_token'] = $_COOKIE['selling_token'];
        }


        $selling = Selling::findOne(['selling_token'=>$selling_token]);
        $state = State::findOne(['id' => $selling->state_id]);
        $customer = $selling->customer;
        $googleLink = $this->googleEmailChange($customer, $selling_token);
        if(\Yii::$app->request->isPjax && isset($_GET['Customer']['chief_email'])){
            $customer->chief_email = $_GET['Customer']['chief_email'];
            $customer->selling_token = $selling_token;
            $customer->save();
            return $this->render('selling-info', compact('selling_token', 'selling', 'customer', 'state','googleLink'));
        }



        return $this->render('selling-info', compact('selling_token', 'selling', 'customer', 'state', 'googleLink'));
    }

    public function googleEmailChange(Customer $customer, $selling_token){
        $clientID = Yii::$app->params['client_id'];
        $clientSecret = Yii::$app->params['client_secret'];
        $redirectUri = 'https://'.$_SERVER['HTTP_HOST'].'/selling/main/show-selling';
        if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
            $redirectUri = 'http://'.$_SERVER['HTTP_HOST'].'/selling/main/show-selling';

        $client = new Google_Client();
        /// следующие сеттеры находятся в классе Google_Client() как элементы массива Google_Client::config
        /// который мы настраиваем при инициализации объекта.
        /// меняем клиентский id, клиентский секрет, ссылка, на которую следует перейти после авторизации
        ///
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setPrompt("consent");
        $client->setRedirectUri($redirectUri);

        /// существует array Google_Client:requestedScopes, который помещает в себе области, которые
        /// запрашивает приложение для авторизации, то есть можем просмотреть некоторые данные пользователя
        /// их следует добавить, чтобы была возможность вызвать страницу гугл авторизации через
        /// почту и осуществить авторизацию / регистрацию пользователя.
        $client->addScope("email");

        // $_GET['code'] присылает гугл после авторизации в его форме и перебросе пользователя на указанный
        // $redirectUri.
        if (isset($_GET['code'])) {
            header("Location: http://".$_SERVER['HTTP_HOST']."/selling/main/show-selling?selling-token=".$_COOKIE['selling_token']);
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email =  $google_account_info->email;
            $customer->chief_email = $email;
            $customer->save();
            Yii::$app->getResponse()->redirect(Url::to(['/selling/main/show-selling?selling_token='.$_COOKIE['selling_token']]));


        }
        return $client->createAuthUrl();
    }
}
