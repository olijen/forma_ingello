<?php

namespace forma\modules\core\controllers;

use forma\modules\core\records\Accessory;
use forma\modules\core\records\User;
use forma\modules\customer\records\Customer;
use Google_Client;
use Google_Service_Oauth2;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use forma\modules\core\forms\LoginForm;
use forma\modules\core\forms\SignupForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'confirm'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', ],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'confirm'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionClearDuplicates() {
        $records = Accessory::find()->all();
        $one = [];
        foreach ($records as $k => $r) {
            if (empty($one[$r->entity_class.$r->entity_id.$r->user_id])) {
                $one[$r->entity_class.$r->entity_id.$r->user_id] = true;
            } else {
                echo $r->entity_class.$r->entity_id.$r->user_id.'<br>';
                $r->delete();
            }
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $googleLink = $this->googleAuth();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $loginLoad = $model->load(Yii::$app->request->post());
        $user = $model->getUser();
        if ($loginLoad) {
            if ($model->login()){
                return $this->goBack();
            }
            else if(!is_null($user) && $user->confirmed_email == 0){
                return Yii::$app->response->redirect('http://'.$_SERVER['HTTP_HOST'].'/core/default/confirm', 301)->send();
            }
        }
        return $this->render('login', [
            'model' => $model,
            'googleLink' => $googleLink
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();

//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
             return $this->goHome();
        }

        Yii::$app->controller->layout = 'main-login';
        return $this->render('signup', compact('model'));
    }

    public function actionSignupReferer()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup(true)) {
            return Yii::$app->response->redirect((['/core/user/referral']));
        }

        Yii::$app->controller->layout = 'main-login';
        return $this->render('signup', compact('model'));
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;

        if (is_null($exception)) {
            return;
        }

        if (!empty($exception->statusCode)) {
            if ($exception->statusCode == 404) {
                return $this->render('404');
            } elseif($exception->statusCode == 505) {
                return $this->render('505');
            } else {
                return $this->render('error');
            }
        }  else {
            return $this->render('error');
        }

    }

    public function actionDoc($page = false) {
        if ($page) $this->layout = false;;
        return $this->render('documentation', ['page' => $page]);
    }

    public function actionConfirm(){
        echo "Hello!";
    }

    public function googleAuth(){
        //todo перенести переменные в конфигурацию
        $clientID = '756749534749-8cqs0dc8jbvshsnpbsk6o8mhg5vtmamd.apps.googleusercontent.com';
        $clientSecret = 'fwk_NIyYpeiJ7jwKtQsF8hJb';
        $redirectUri = 'http://'.$_SERVER['HTTP_HOST'].'/login';

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
        $client->addScope("profile");


        // $_GET['code'] присылает гугл после авторизации в его форме и перебросе пользователя на указанный
        // $redirectUri.
        if (isset($_GET['code'])) {
            //меняем присланный $_GET['code'] на валидный токен доступа
            //получаем класс OAuth2, куда передаем $_GET['code']
            //с помощью обработчика запросов httpHandler получаем токен доступа
            //$token is array содержащие некоторые данные о токене доступа, собственно который
            //содержится как элемент массива $token['access_token']
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email =  $google_account_info->email;
            $name =  $google_account_info->name;
            $loginForm = new LoginForm();
            $loginForm->email = $email;
            if($loginForm->getUser() != false){
                if($loginForm->googleLogin()) return $this->goHome();
            }
            else {
                $signupForm = new SignupForm();
                $signupForm->username = $name;
                $signupForm->email = $email;
                $signupForm->password = $signupForm->getRandomPassword();
                $signupForm->signup(null, true);
            }

            // now you can use this profile info to create account in your website and make user logged in.
        } else {
            //билдим ссылку, которая переводит нас на форму авторизации гугла, после она передает
            //$_GET['code'] и мы можем авторизоваться
            return $client->createAuthUrl();
        }
    }
}
