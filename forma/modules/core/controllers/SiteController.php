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
    const EVENT_AFTER_LOGIN = "eventAfterLogin";


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'confirm', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup', 'confirm'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', ],
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
        Yii::debug("hosoposapoap");
        //var_dump(Yii::$app->request->referrer); exit;
        //если от гугла пришел отвте = мы регаем/авторизуем пользователя и теперь он не гость
        $googleLink = $this->googleAuth();
        Yii::debug($googleLink);
        //не гость - редирект на главную
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $loginLoad = $model->load(Yii::$app->request->post());
        $user = $model->getUser();
        if ($loginLoad) {
            if ($model->login()){
                $this->trigger(self::EVENT_AFTER_LOGIN);
                if (isset($_COOKIE['after_login_link'])) {
                    return Yii::$app->response->redirect($_COOKIE['after_login_link']);
                }
                return Yii::$app->response->redirect('/');
            }
            else if(!is_null($user) && $user->confirmed_email == 0){
                return Yii::$app->response->redirect('https://'.$_SERVER['HTTP_HOST'].'/core/default/confirm', 301)->send();
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
        $googleLink = $this->googleAuth();
        Yii::debug('зашли на туда регистрация');
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        Yii::debug('зашли на туда регистрация');


        $modelLogin = new LoginForm();
        $loginLoad = $modelLogin->load(Yii::$app->request->post());
        if (isset($_POST['login-button'])) {
            $user = $modelLogin->getUser();
            if ($loginLoad) {
                if ($modelLogin->login()){
                    Yii::debug("trigger");
                    $this->trigger(self::EVENT_AFTER_LOGIN);
                    return $this->goBack();
                }
                else if(!is_null($user) && $user->confirmed_email == 0){
                    return Yii::$app->response
                        ->redirect('https://'.$_SERVER['HTTP_HOST'].'/core/default/confirm', 301)
                        ->send();
                }
            }
        }

        $model = new SignupForm();
        Yii::debug('зашли на туда регистрация');
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goHome();
        }

        Yii::$app->controller->layout = 'main-login';
        return $this->render('signup', compact('model', 'modelLogin', 'googleLink'));
    }

    public function actionSignupReferer()
    {
        $googleLink = $this->googleAuth();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup(true)) {
            return Yii::$app->response->redirect((['/core/user/referral']));
        }

        Yii::$app->controller->layout = 'main-login';
        return $this->render('signup-ref', compact('model', 'googleLink'));
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;

        if (is_null($exception)) {
            return;
        }

        if (Yii::$app->user->isGuest) {
            setcookie(
                "after_login_link",
                $actual_link =
                    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                    . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
            );

            return $this->redirect(Url::to(['/login']));
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
        $clientID = Yii::$app->params['client_id'];
        $clientSecret = Yii::$app->params['client_secret'];
        $redirectUri = 'https://forma.ingello.com/login';
        if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
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
        $client->setPrompt('consent');

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
                if($loginForm->googleLogin()) {
                    $this->trigger(self::EVENT_AFTER_LOGIN);
                    return $this->goHome();
                }
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
