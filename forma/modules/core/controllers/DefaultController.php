<?php

namespace forma\modules\core\controllers;

use Exception;
use forma\components\Controller;
use forma\modules\core\components\AutoDumpDataBase;
use forma\modules\core\components\UserIdentity;
use forma\modules\core\forms\LoginForm;
use forma\modules\core\forms\SignupForm;
use forma\modules\core\records\SystemEventSearch;
use forma\modules\core\records\User;
use forma\modules\core\records\WidgetUser;
use forma\modules\hr\services\InterviewService;
use forma\modules\product\services\ProductService;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\selling\forms\SalesProgress;
use forma\modules\selling\services\SellingService;
use forma\modules\transit\services\TransitService;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Oauth2;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;


class DefaultController extends Controller
{

    const EVENT_AFTER_LOGIN = "eventAfterLogin";

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'confirm', 'auth', 'landing'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['confirm', 'index', 'auth', 'landing'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','confirm','auth', 'landing'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
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
                    if ($modelLogin->login()) {
                        Yii::debug("trigger");
                        $this->trigger(self::EVENT_AFTER_LOGIN);
                        //todo: ue special list from DB or configs
                        if ($_REQUEST['LoginForm']['email'] == 'rakhiv@gmail.com') {
                            return Yii::$app->response
                                ->redirect('/hr/victim', 301)
                                ->send();
                        }
                        return $this->goBack();
                    } else if (!is_null($user) && $user->confirmed_email == 0) {
                        return Yii::$app->response
                            ->redirect('https://' . $_SERVER['HTTP_HOST'] . '/core/default/confirm', 301)
                            ->send();
                    } else {
                        $_GET['failedLogin'] = true;
                    }
                }
            }

            $model = new SignupForm();
            if (isset($_POST['signup-button'])) {
                Yii::debug('зашли на туда регистрация');
                if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                    return $this->goHome();
                } else {
                    $_GET['failedSignup'] = true;
                }
            }

            Yii::$app->controller->layout = false;
            if(isset($_SERVER['HTTP_REFERER'])){
                $url = $_SERVER['HTTP_REFERER'];
                if(isset(parse_url($url)['query'])){
                    parse_str(parse_url($url)['query'], $params);
                }
            }
            //TODO можно изменить на более правильный метод (сейчас топорный)
            if (isset($_GET['without-header']) || isset($params['userId'])){
            return $this->render('auth', compact('model', 'modelLogin', 'googleLink'));
            }
            if (isset($_GET['landing'])) {
                return $this->render('landing', compact('model', 'modelLogin', 'googleLink'));
            }
            return $this->render('auth', compact('model', 'modelLogin', 'googleLink'));
        }


        if (!empty(Yii::$app->user->identity->email_string)) {
            $this->layout = 'public';
            return $this->render('blank');
        }


        $productsCount = ProductService::getCount();
        $completePurchasesCount = PurchaseService::getCompleteCount();
        $completeTransitsCount = TransitService::getCompleteCount();
        $completeSellingsCount = SellingService::getCompleteCount();
        $salesProgress = new SalesProgress();

        $widgetUser = new WidgetUser();
        $widgetUser->getWidgetsInOrder();
        $widgetOrder = $widgetUser->checkUserWidgets() ?? [];
        \Yii::debug($widgetOrder);
        \Yii::debug(count($widgetOrder));
        $widgetNewOrder = false;
        if (count($widgetOrder['panelSmallWidget']) == 0 && count($widgetOrder['panelBigWidget1']) == 0 &&
            count($widgetOrder['panelBigWidget2']) == 0)
            $widgetNewOrder = true;


        //массив продаж по дням на неделю
        $salesInWeek = SellingService::getSellingInWeek();
        Yii::debug($salesInWeek);

        //работающие сотрудники
        $searchModelWorkers = InterviewService::search();
        $dataProviderWorkers = $searchModelWorkers->search(Yii::$app->request->queryParams, 5);
        $dataProviderWorkers->getModels();

        //продажи по складам
        $sellingInWarehouse = SellingService::getSellingInWarehouse();

        //история событий
        $searchModelSystemEvent = new SystemEventSearch();

        $query = $searchModelSystemEvent->search(Yii::$app->request->queryParams);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->query->count(), 'pageParam' => 'page-event']);
        $systemEventsRows = $countQuery->query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        Yii::debug($pages);

        if (Yii::$app->request->isPjax && isset($_GET['page-event'])) {
            return \forma\modules\core\widgets\SystemEventWidget::widget(['timeline' => true, 'searchModel' => $searchModelSystemEvent, 'pages' => $pages, 'systemEventsRows' => $systemEventsRows]);
        }

        if (Yii::$app->request->isPjax && isset($_GET['page'])) {
            return \forma\modules\core\widgets\WorkersWidget::widget(['tableView' => true, 'searchModelWorkers' => $searchModelWorkers,
                'dataProviderWorkers' => $dataProviderWorkers]);
        }


        return $this->render('index', compact(
            'productsCount',
            'completePurchasesCount',
            'completeTransitsCount',
            'completeSellingsCount',
            'salesProgress',
            'widgetOrder',
            'widgetNewOrder',
            'salesInWeek',
            'searchModelWorkers',
            'dataProviderWorkers',
            'sellingInWarehouse',
            'searchModelSystemEvent',
            'pages',
            'systemEventsRows'
        ));
    }

    public function actionLanding()
    {
        Yii::$app->controller->layout = false;
        return $this->render('landing');
    }

    public function actionChangeAccount()
    {
        $identity = User::findOne(['id' => $_POST['id']]);
        $currentUser = User::findOne(['id' => Yii::$app->user->id]);
        $loginForm = new LoginForm();
        $loginForm->setAttributes([
            'email' => $identity->email
        ]);
        if ($identity->parent_id == Yii::$app->user->id || $currentUser->email == 'admin@admin.admin') {
            if ($loginForm->getUser() != false) {
                if ($loginForm->googleLogin()) {
                    $this->trigger(self::EVENT_AFTER_LOGIN);
                    return $this->goHome();
                }
            }
        }
    }

    //todo: ВНИМАНИЕ!! Видимо этот метод не используется. Смотри Index
    public function actionAuth()
    {
        if (Yii::$app->user->isGuest) {
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
                    if ($modelLogin->login()) {
                        Yii::debug("trigger");
                        $this->trigger(self::EVENT_AFTER_LOGIN);
                        return $this->goBack();
                    } else if (!is_null($user) && $user->confirmed_email == 0) {
                        return Yii::$app->response
                            ->redirect('https://' . $_SERVER['HTTP_HOST'] . '/core/default/confirm', 301)
                            ->send();
                    } else {
                        $_GET['failedLogin'] = true;
                    }
                }
            }

            $model = new SignupForm();
            if (isset($_POST['signup-button'])) {
                Yii::debug('зашли на туда регистрация');
                if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                    return $this->goHome();
                } else {
                    $_GET['failedSignup'] = true;
                }
            }

            Yii::$app->controller->layout = false;
            return $this->render('auth', compact('model', 'modelLogin', 'googleLink'));
        }
        return $this->goHome();
    }

    public function actionPeople()
    {
        return $this->render('people');
    }

    public function actionCalendar()
    {
        $clID = '909078294901-qjij3u1sbv80cd9m247tnvamn7gcgmm0.apps.googleusercontent.com';
        $clS = 'yf40ojWJgikgDQombGSc150o';


        if (php_sapi_name() != 'cli') {
            throw new Exception('This application must be run on the command line.');
        }

        /**
         * Returns an authorized API client.
         * @return Google_Client the authorized client object
         */
        function getClient()
        {
            $client = new Google_Client();
            $client->setApplicationName('Google Calendar API PHP Quickstart');
            $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
            $client->setAuthConfig('credentials.json');
            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');

            // Load previously authorized token from a file, if it exists.
            // The file token.json stores the user's access and refresh tokens, and is
            // created automatically when the authorization flow completes for the first
            // time.
            $tokenPath = 'token.json';
            if (file_exists($tokenPath)) {
                $accessToken = json_decode(file_get_contents($tokenPath), true);
                $client->setAccessToken($accessToken);
            }

            // If there is no previous token or it's expired.
            if ($client->isAccessTokenExpired()) {
                // Refresh the token if possible, else fetch a new one.
                if ($client->getRefreshToken()) {
                    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                } else {
                    // Request authorization from the user.
                    $authUrl = $client->createAuthUrl();
                    printf("Open the following link in your browser:\n%s\n", $authUrl);
                    print 'Enter verification code: ';
                    $authCode = trim(fgets(STDIN));

                    // Exchange authorization code for an access token.
                    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                    $client->setAccessToken($accessToken);

                    // Check to see if there was an error.
                    if (array_key_exists('error', $accessToken)) {
                        throw new Exception(join(', ', $accessToken));
                    }
                }
                // Save the token to a file.
                if (!file_exists(dirname($tokenPath))) {
                    mkdir(dirname($tokenPath), 0700, true);
                }
                file_put_contents($tokenPath, json_encode($client->getAccessToken()));
            }
            return $client;
        }


        // Get the API client and construct the service object.
        $client = getClient();
        $service = new Google_Service_Calendar($client);

        // Print the next 10 events on the user's calendar.
        $calendarId = 'primary';
        $optParams = array(
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c'),
        );
        $results = $service->events->listEvents($calendarId, $optParams);
        $events = $results->getItems();

        if (empty($events)) {
            print "No upcoming events found.\n";
        } else {
            print "Upcoming events:\n";
            foreach ($events as $event) {
                $start = $event->start->dateTime;
                if (empty($start)) {
                    $start = $event->start->date;
                }
                printf("%s (%s)\n", $event->getSummary(), $start);
            }
        }
    }

    public function actionCalend()
    {
        echo "<iframe src=\"https://calendar.google.com/calendar/embed?src=tyzhukotinskiy%40gmail.com&ctz=Europe%2FKiev\" style=\"border: 0\" width=\"800\" height=\"600\" frameborder=\"0\" scrolling=\"no\"></iframe>";
    }

    public function actionConfirm()
    {
        $this->layout = 'main-login';
        $confirmed = false;
        if (isset($_GET['email_string']) && !is_null(UserIdentity::findByEmailString($_GET['email_string']))) {
            $user = UserIdentity::findByEmailString($_GET['email_string']);
            $user->confirmed_email = 1;
            //$user->email_string = null;
            $user->save();
            $confirmed = true;
        }
        return $this->render('confirm', compact('confirmed'));
    }


    public function actionTestData()
    {
        ini_set('max_execution_time', 30);
        $dump = new AutoDumpDataBase();
        if ($dump->start()) {
            Yii::$app->user->identity->email_string = null;
            Yii::$app->user->identity->save();
            \yii\helpers\Url::remember();

            return $this->redirect('/core/regularity/regularity');
        }
    }

    public function googleAuth()
    {
        //todo перенести переменные в конфигурацию
        $clientID = Yii::$app->params['client_id'];
        $clientSecret = Yii::$app->params['client_secret'];
        $redirectUri = 'https://forma.ingello.com/login';
        if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
            $redirectUri = 'http://' . $_SERVER['HTTP_HOST'] . '/login';


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
            $email = $google_account_info->email;
            $name = $google_account_info->name;
            $loginForm = new LoginForm();

            $loginForm->email = $email;
            if ($loginForm->getUser() != false) {
                if ($loginForm->googleLogin()) {
                    $this->trigger(self::EVENT_AFTER_LOGIN);
                    return $this->goHome();
                }
            } else {
                $signupForm = new SignupForm();
                if (!Yii::$app->user->isGuest) {
                    $signupForm->parent_id = Yii::$app->user->identity->id;
                }
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


