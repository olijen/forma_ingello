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
                'only' => ['login', 'logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', ],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
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
        $googleLink = $this->GoogleAuth();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
        if ($page) $this->layout = false;
        return $this->render('documentation', ['page' => $page]);
    }

    public function GoogleAuth(){
        $clientID = '756749534749-8cqs0dc8jbvshsnpbsk6o8mhg5vtmamd.apps.googleusercontent.com';
        $clientSecret = 'fwk_NIyYpeiJ7jwKtQsF8hJb';
        $redirectUri = 'http://localhost:3000/login';
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email =  $google_account_info->email;
            $name =  $google_account_info->name;
            $loginForm = new LoginForm();
            $loginForm->email = $email;
            $loginForm->password = "gigity";
            if ($loginForm->login()) {
                return $this->goHome();
            }
            else {
                $signupForm = new SignupForm();
                $signupForm->username = $name;
                $signupForm->email = $email;
                $signupForm->password = "gigity";
                $signupForm->signup();
            }

            // now you can use this profile info to create account in your website and make user logged in.
        } else {
            return $client->createAuthUrl();
        }
    }
}
