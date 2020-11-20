<?php

namespace forma\modules\core\controllers;

use Composer\Util\Url;
use Exception;

use forma\modules\core\records\Accessory;
use forma\modules\core\records\SystemEventSearch;
use forma\modules\core\widgets\SystemEventWidget;
use forma\modules\hr\services\InterviewService;
use forma\modules\product\services\ProductService;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\selling\forms\SalesProgress;
use forma\modules\transit\services\TransitService;
use forma\modules\selling\services\SellingService;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;
use Google_Client;
use Google_Service_Calendar;
use Yii;
use yii\data\Pagination;
use yii\helpers\Inflector;
use yii\web\Controller;
use yii\filters\AccessControl;
use forma\modules\core\components\UserIdentity;
use forma\modules\core\records\WidgetUser;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'confirm'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['confirm',],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index',],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
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
            $user->email_string = null;
            $user->save();
            $confirmed = true;
        }
        return $this->render('confirm', compact('confirmed'));
    }


    public function actionTestData()
    {
        $modelsRoute = [
            '\forma\modules\core\records\Accessory',
            '\forma\modules\product\records\Product',
        ];
        $modelsRoute = [
            '\forma\modules\warehouse\records\WarehouseUser',
                ['\forma\modules\warehouse\records\Warehouse',
                    '\forma\modules\warehouse\records\WarehouseProduct',],
        ];


        if (true) {
//            $accessoryKeys = $this->actionAccessory();
            $accessoryKeys = ['forma\modules\product\records\Product' => ['102' => '186', '103' => '185', '107' => '184',]];
        }
        foreach ($modelsRoute as $modelsRoutWhitUser) {
            $ids = $this->modelWhitUser($modelsRoutWhitUser);

        }
        de('$modelRoute');
    }

    public function dsa($ids, $accessoryKeys)
    {
        $warehouseModels = Warehouse::findAll($ids);

        for ($i = 0; $i < count($warehouseModels); $i++) {
            // сохранение варехаус
//                $this->saveNewRecord($warehouseModels[$i]);
//                de($warehouseUsers[$i]);
            // сохранение варехоус user
//                $this->saveNewRecord($warehouseUsers[$i]);
        }

        $warehouseProductModels = WarehouseProduct::find()
            ->where(['warehouse_id' => $ids, 'product_id' => ['102', '103', '107']])->all();
        foreach ($warehouseProductModels as $warehouseProductModel) {
            foreach ($accessoryKeys['forma\modules\product\records\Product'] as $key => $newKey) {
                if ($warehouseProductModel->product_id == $key) {
                    $warehouseProductModel->product_id = $newKey;
                }
            }
//               $newModels[]= $this->saveNewRecord($warehouseProductModel);// сохранение без юзера
        }
    }

    public function modelWhitUser($modelsRoutWhitUser)
    {
        $modelWhitUser = $modelsRoutWhitUser::find()->where(['user_id' => 1])->all(); // найдем все варехаус user
        $ids = [];
        foreach ($modelWhitUser as $model) {
            $ids [] = $model->warehouse_id;
        }
    }

    public function actionAccessory()
    {
        $model = new Accessory();

        $arrayModels = $model::find()->where(['user_id' => 1])
            ->andWhere(['like', 'entity_class', '%' . 'Product', false])->all();
        $accessoryKeys = [];
        foreach ($arrayModels as $model) {
            $accessoryKeys[$model->entity_class] [$model->entity_id] = $model->entity_id;
        }

        foreach ($accessoryKeys as $entityClass => $modelId) {
            $modelRout = '\\' . $entityClass;
            $models = $modelRout::findAll($modelId);

            foreach ($models as $model) {
                $key = $model->id;
                $newModel = $this->saveNewRecord($model);

                $accessoryKeys[$entityClass][$key] = $newModel->id;
            }
        }

        return $accessoryKeys;
    }

    public function saveNewRecord($model)
    {
        $model->isNewRecord = true;
        $model->id = null;

        if (!$model->save()) {
            de($model->errors);
        }
        return $model;
    }

    public function data()
    {
        return $tables =

            [
                '\forma\modules\hr\records\Answer',
                '\forma\modules\product\records\Category',
                '\forma\modules\product\records\Currency',
                '\forma\modules\customer\records\Customer',
//                '\forma\modules\product\records\Event',
//                '\forma\modules\product\records\EventType',
            '\forma\modules\product\records\Field',
            '\forma\modules\product\records\FieldProductValue',
            '\forma\modules\product\records\FieldValue',
            '\forma\modules\hr\records\Interview',
            '\forma\modules\hr\records\InterviewVacancy',
            '\forma\modules\inventorization\records\Inventorization',
            '\forma\modules\inventorization\records\InventorizationProduct',
            '\forma\modules\core\records\Item',
            '\forma\modules\product\records\Manufacturer',
            '\forma\modules\message\records\Message',
            '\forma\modules\product\records\Migration',
            '\forma\modules\overheadcost\records\OverheadCost',
            '\forma\modules\product\records\PackUnit',
            '\forma\modules\selling\records\Patient',
            '\forma\modules\product\records\Product',
            '\forma\modules\product\records\ProductPackUnit',
            '\forma\modules\project\records\Project',
            '\forma\modules\project\records\ProjectUser',
            '\forma\modules\project\records\ProjectVacancy',
            '\forma\modules\project\records\ProjectVacancyOld',
            '\forma\modules\purchase\records\Purchase',
            '\forma\modules\purchase\records\PurchaseOverheadCost',
            '\forma\modules\purchase\records\PurchaseProduct',
            '\forma\modules\core\records\Regularity',
            '\forma\modules\hr\records\Request',
            '\forma\modules\hr\records\RequestStrategy',
            '\forma\modules\hr\records\RequestStrategyOld',
            '\forma\modules\selling\records\Selling',
            '\forma\modules\selling\records\SellingProduct',
            '\forma\modules\selling\records\State',
            '\forma\modules\selling\records\StateToState',
            '\forma\modules\hr\records\Strategy',
            '\forma\modules\supplier\records\Supplier',
            '\forma\modules\core\records\SystemEvent',
            '\forma\modules\core\records\SystemEventUser',
            '\forma\modules\product\records\TaxRate',
            '\forma\modules\transit\records\Transit',
            '\forma\modules\transit\records\TransitOverheadCost',
            '\forma\modules\transit\records\TransitProduct',
            '\forma\modules\product\records\Type',
            '\forma\modules\vacancy\records\Vacancy',
            '\forma\modules\warehouse\records\WarehouseUser',
            '\forma\modules\warehouse\records\Warehouse',
            '\forma\modules\warehouse\records\WarehouseProduct',
            '\forma\modules\core\records\WidgetUser',
            '\forma\modules\worker\records\Worker',
            '\forma\modules\worker\records\WorkerVacancy'];
    }
}


