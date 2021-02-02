<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\services\FreelancehuntService;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\state\State;
use forma\modules\warehouse\records\Warehouse;
use Yii;
use forma\components\Controller;

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

    private function sendToFLH($token, $id, $json)
    {
        $curl = curl_init();

        $json = trim($json);
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.freelancehunt.com/v2/projects/$id/bids",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $token,
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);
    }

    public function actionCreateBid($link, $text = '', $days = 5,  $amount = 28100) {

        $tokens = [
            'a80ee1fc7d242f9000be6f898e67d826fa3ff153',
            '940e8779cb67c9b4657fb3f07356f398238c7e9b',
        ];

        $list = [
            'https://freelancehunt.com/project/sayt-internet-magazina/658875.html',
            //...
        ];

        if ($link == '' && $list) {
            foreach ($list as $k => $link) {
                $this->actionCreateBid($link, $text, $days,  $amount);
            }
            exit;
        }

        $parts = explode('/', $link);
        $id = $parts[count($parts)-1];
        $id = explode('.', $id)[0];

        $response = $this->sendToFLH($tokens[0], $id, json_encode([
            'days' => $days,
            'safe_type' => 'employer',
            'budget' => ['amount' => $amount, 'currency' => 'UAH', ],
            'comment' => $text,
            'is_hidden' => true,
        ]));

        $secondResponse  = $this->sendToFLH($tokens[1], $id, json_encode([
            'days' => 5,
            'safe_type' => 'employer',
            'budget' => ['amount' => 5000, 'currency' => 'UAH', ],
            'comment' => 'Добрый день. Проект сделать не проблема, но для начала надо проработать ТЗ. Я работаю в компании Ingello и специализируюсь на разработке качественных технических заданий. В сумму входит так же консультация с опытным программистом и системным архитектором. ТЗ будет описывать не только функциональные требования, но и требования к качеству кода и архитектуры, будут предложены технические решения или проверенные готовые компоненты. После полного разбора мы сможем дать команду или программиста для реализации проекта.',
            //'is_hidden' => true,
        ]));

        //todo: replace to view

        echo "<a  href=/selling/freelancehunt/bid-form><div class='circlebutton' style='background: cadetblue;'>Форма</div></a>";
        echo "<a  href='$link'><div class='circlebutton' style='background: orange;'>Проект</div></a>";
        echo "<a  href='javascript:window.close();'><div class='circlebutton' style='background: darkred;'>Закрыть</div></a>";
        echo "<div class='clear'></div>";

        if (!empty($response['error'])) {
            echo "<h1><span style='color:red;'>X</span> " . @$response['error']["detail"] . "</h1>";
        } else {
            echo "<h1><span style='color:green;'>V</span> Основной ответ успешно отправлен</h1>";
        }

        if (!empty($secondResponse['error'])) {
            echo "<h1><span style='color:red;'>X</span> " . @$secondResponse['error']["detail"] . "</h1>";
        } else {
            echo "<h1><span style='color:green;'>V</span> По ТЗ успешно отправили</h1>";
        }

        echo "<hr>";

        echo "<pre>";
        var_dump($response);
        echo "</pre>";

        echo "<pre>";
        var_dump($secondResponse);
        echo "</pre>";

        echo '<style>
          .clear {
            clear: both;
          }
          
          .circlebutton {
            margin: 15px;
            text-align: center;
            line-height: 300px;
            width: 300px;
            border-radius: 50%;
          }
          
          a {
            float: left;
            font-family: Geneva, Arial, Helvetica, sans-serif;
            color: white;
            font-size: 50px;
          }
          
          .circlebutton:hover {
            color: #ccc;
            box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
          }
        </style>';

        exit;
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
