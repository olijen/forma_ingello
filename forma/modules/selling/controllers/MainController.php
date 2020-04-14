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

        $selling = Selling::findOne(['selling_token'=>$selling_token]);
        $state = State::findOne(['id' => $selling->state_id]);
        $customer = $selling->customer;
        $customer_country = $customer->country;
        var_dump($customer->country);
        var_dump($state);
        echo"<br/><br/>";
        //var_dump($model);
        echo "<hr><h1>".$selling->name."</h1>";
        echo "<p>Состояние заказа:".$state->name."</p>";
        echo "<h3>Ваши личные данные</h3>
                <p>Ваши лд мы особенно точно не передадим левым третьим лицам, чьи руки перенесут их в Даркнет</p>
                <p>Ваше имя: {$customer->name}</p>
                <p>Ваше государство: {$customer_country->name}</p>
                <p>Ваш адрес(за вами уже выехали): {$customer->address}</p>
                <p>E-mail личный: {$customer->chief_email}</p>
                <p>E-mail компании: {$customer->company_email}</p>
                <p>Телефон личный: {$customer->chief_phone}</p>
                <p>Телефон компании: {$customer->company_phone}</p>
                <p>Сайт компании: {$customer->site_company}</p>
                
";
    }
}
