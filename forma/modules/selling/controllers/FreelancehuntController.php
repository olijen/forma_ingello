<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\services\FreelancehuntService;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\state\State;
use forma\modules\warehouse\records\Warehouse;
use Yii;
use yii\web\Controller;

class FreelancehuntController extends Controller
{

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $projects = FreelancehuntService::getPotentialProjects();

        return $this->render('index', ['projects' => $projects]);
    }

    public function actionBidForm($url = null, $selling_id = null)
    {
        $customer = null;
        $selling = null;

        if (!empty($_REQUEST['name'])) {
            $name = $_REQUEST['name'];
            $positive = $_REQUEST['positive'];
            $negative = $_REQUEST['negative'];
            $published_at = $_REQUEST['published_at'];
            $description_html = base64_decode($_REQUEST['description_html']);

            $selling = new Selling();
            $selling->dialog = "
            <h2>$name</h2> Positive: $positive, Negative: $negative, 
            <a target='_blank' href='$url'>$url</a><hr />" . $description_html;

            $selling->next_step = 'Получить контакты';
            $selling->date_create = $published_at;

            $state_id = State::findOne(['user_id'=> Yii::$app->user->id])->id;
            $selling->state_id = $state_id;
            $a = Warehouse::getList();
            foreach (Warehouse::getList() as $id => $value) {
                $warehouse_id = $id; break;
            }
            $selling->warehouse_id = $warehouse_id;

            $customer = new Customer;
            mb_internal_encoding("UTF-8");
            $customer->name = mb_substr($name, 0, 97) . (strlen($name) > 97 ? '...' : '');

            if (!$customer->save()) {
                var_dump($customer->getErrors());
            } else {
                $selling->customer_id = $customer->id;
                if (!$selling->save()) {
                    var_dump($selling->getErrors());
                } else {
                    return $this->redirect('/selling/freelancehunt/bid-form?url='.$url.'&selling_id='.$selling->id);
                }
            }
            var_dump($_REQUEST);
            exit('Ошибка сохранения! <a href=');
        }

        if (!empty($selling_id)) {
            $selling = Selling::findOne(['id' => $selling_id]);
            $customer = $selling->customer;
        }

        return $this->render('bid', [
            'link' => $url,
            'customer' => $customer,
            'selling' => $selling,
        ]);
    }

    public function actionCreateBid($link, $text = '', $days = 5,  $amount = 28100) {

        $list = [
            'https://freelancehunt.com/project/sayt-internet-magazina/658875.html',
            'https://freelancehunt.com/project/sozdanie-birzhi-zadaniy-obmena-dannyih/658697.html',
            'https://freelancehunt.com/project/razrabotat-verstku-bekend/658670.html',
            'https://freelancehunt.com/project/dorabotka-funktsionala-skripta-php/658687.html',
            'https://freelancehunt.com/project/razrabotka-bekenda-dlya-mobilnogo-prilozheniya/658667.html',
            'https://freelancehunt.com/project/sozdanie-sayta-interesnogo-sayta/657195.html',
            'https://freelancehunt.com/project/razrabotka-onlayn-igryi-formate-kvest-shou/657404.html',
            'https://freelancehunt.com/project/sayt-dlya-obucheniya/654333.html',
            'https://freelancehunt.com/project/html-php-website-creation/654338.html',
            'https://freelancehunt.com/project/optimizatsiya-kinosayta-na-platforme-dle/653172.html',
            'https://freelancehunt.com/project/sozdat-veb-proekt-servis-vpn/653818.html',
            'https://freelancehunt.com/project/razrabotka-sayta-kompanii/653794.html',
            'https://freelancehunt.com/project/sayt-dostavki-edyi-produktov/653861.html',
            'https://freelancehunt.com/project/trebuetsya-opyitnyiy-veb-razrabotchik-na-dolgosrochnuyu/653860.html',
            'https://freelancehunt.com/project/mnogopotochnost-programmirovanie/653849.html',
            'https://freelancehunt.com/project/sayt-svyazannyiy-botom-telegram/645242.html',
        ];

        if ($link == '' && $list) {
            foreach ($list as $k => $link) {
                $this->actionCreateBid($link, $text, $days,  $amount);
            }
            exit;
        }

        $curl = curl_init();
        $response = [];

        $parts = explode('/', $link);
        $id = $parts[count($parts)-1];
        $id = explode('.', $id)[0];

        $json = json_encode([
            'days' => $days,
            'safe_type' => 'employer',
            'budget' => ['amount' => $amount, 'currency' => 'UAH', ],
            'comment' => $text,
            'is_hidden' => true,
        ]);

        $json = trim($json);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.freelancehunt.com/v2/projects/$id/bids",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer a80ee1fc7d242f9000be6f898e67d826fa3ff153",
                "Content-Type: application/json"
            ),
        ));

        $response[] = curl_exec($curl);

        curl_close($curl);

        echo "<a href=/selling/freelancehunt/bid-form>Форма ставок</a><hr>";
        echo "<a href='$link'>Проект</a><hr>";
        echo "<pre>";
        var_dump(json_decode($json));
        echo "</pre>";

        echo "<pre>";
        var_dump($response);
        echo "</pre>";
    }

    public function actionCreateBids($link, $text = '', $days = 5,  $amount = 28100)
    {

        $list = [
            'https://freelancehunt.com/project/sayt-internet-magazina/658875.html',
            'https://freelancehunt.com/project/sozdanie-birzhi-zadaniy-obmena-dannyih/658697.html',
            'https://freelancehunt.com/project/razrabotat-verstku-bekend/658670.html',
            'https://freelancehunt.com/project/dorabotka-funktsionala-skripta-php/658687.html',
            'https://freelancehunt.com/project/razrabotka-bekenda-dlya-mobilnogo-prilozheniya/658667.html',
            'https://freelancehunt.com/project/sozdanie-sayta-interesnogo-sayta/657195.html',
            'https://freelancehunt.com/project/razrabotka-onlayn-igryi-formate-kvest-shou/657404.html',
            'https://freelancehunt.com/project/sayt-dlya-obucheniya/654333.html',
            'https://freelancehunt.com/project/html-php-website-creation/654338.html',
            'https://freelancehunt.com/project/optimizatsiya-kinosayta-na-platforme-dle/653172.html',
            'https://freelancehunt.com/project/sozdat-veb-proekt-servis-vpn/653818.html',
            'https://freelancehunt.com/project/razrabotka-sayta-kompanii/653794.html',
            'https://freelancehunt.com/project/sayt-dostavki-edyi-produktov/653861.html',
            'https://freelancehunt.com/project/trebuetsya-opyitnyiy-veb-razrabotchik-na-dolgosrochnuyu/653860.html',
            'https://freelancehunt.com/project/mnogopotochnost-programmirovanie/653849.html',
            'https://freelancehunt.com/project/sayt-svyazannyiy-botom-telegram/645242.html',
        ];

        if ($link == '' && $list) {
            foreach ($list as $k => $link) {
                $this->actionCreateBid($link, $text, $days, $amount);
            }
            exit;
        }
    }
}
