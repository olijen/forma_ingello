<?php

namespace forma\modules\selling\forms;

use Yii;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\services\SellingService;
use forma\modules\selling\records\state\State;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class SalesProgress extends Model
{

    protected $salesDP;
    /** @var Selling[] */
    protected $models;
    /** @var array */
    protected $states;
    protected $sales;
    protected $sellinghistory;

    public function __construct()
    {
        parent::__construct();
        // Получили список продаж
        $this->salesDP = SellingService::search()->search([]);
        $this->models = $this->salesDP->models;

        //список состояний пользователа
        $this->states = State::find()
            ->where(['user_id' => Yii::$app->user->getId()])
            ->orderBy('order')
            ->all();

        $this->sellinghistory = \forma\modules\selling\records\sellinghistory\SellingHistory::find()->where(['user_id' => Yii::$app->user->id])->all();

        // перебиваем состояния и находим в какой продаже они находятся
        foreach ($this->states as $state) {
            $this->sales[$state->id] = ['sum' => 0, 'color' => ''];
        }

        //мы находим каких состояний сколько
        foreach ($this->models as $model) {
            Yii::debug($model->id . ' - id; ' . $model->state_id);
            if (isset($this->sales[$model->state_id]))
                if ($model->state_id !== null) {
                    $this->sales[$model->state_id]['sum']++;
                }
        }
        $this->getLabelsString();

    }

    public function getColorsString()
    {
        $colorsString = '';

        $green = '"rgba(88, 98, 142, 1)",';
        $yellow = '"rgba(88, 98, 142, 1)",';
        $red = '"rgba(88, 98, 142, 1)",';

        $lastSale = false;
        if ($this->sales) {
            foreach ($this->sales as &$sale) {
                if (!$lastSale) {
                    $lastSale = $sale;
                    continue;
                }

                if ($sale['sum'] > $lastSale['sum']) {
                    $lastSale['color'] = $red;
                } elseif ($lastSale['sum'] == ($sale['sum'])) {
                    $lastSale['color'] = $yellow;
                } else {
                    $lastSale['color'] = $green;
                }
                @$e[] = $lastSale['color'];
                $colorsString .= $lastSale['color'];
                $lastSale = $sale;
            }
        }
        $colorsString .= $green;

        return $colorsString;
    }

    public function getDataString()
    {
        $result = '';
        if ($this->sales) {
            foreach ($this->sales as $sale) {
                $result .= $sale['sum'] . ',';
            }
        }


        return $result;
    }

    public function getLabelsString()
    {
        $result = '';

        foreach ($this->states as $name => $state) {

            $result .= '"' . $state['name'] . '",';
        }
        return $result;
    }

    public function getDateForCount()
    {
        $data = ArrayHelper::map($this->sellinghistory, 'date', 'count');
        $data = array_reverse($data);


        $list = [];
        $days = (int)date('t');
        for ($d = 1; $d <= $days; $d++) {
            $time = mktime(12, 0, 0, date('m'), $d, date('Y'));
            if (date('m', $time) == date('m'))
                $list[date('d.m.Y', $time)] = 0;
        }

        $result = [];

        foreach ($data as $key => $date) {
            $dates = date('d.m.Y', strtotime($key));
            $result [$dates] = $date;
        }
        foreach ($list as $key => $value) {
            foreach ($result as $k => $v) {
                if ($key == $k) {
                    $list[$key] = $v;
                }
            }
        }
        $list = array_reverse($list);
        return $list;
    }

    public function getDate()
    {
        $date = $this->getDateForCount();
        $daties = '';
        foreach ($date as $key => $item) {
            $daties .= '"' . $key . '",';
        }
        return $daties;

    }

    public function getCount()
    {
        $counte = $this->getDateForCount();
        $count = '';
        foreach ($counte as $key => $item) {
            $count .= '"' . $item . '",';
        }
        return $count;

    }


    public function getComaListOfSales()
    {
        $i = 0;
        $string = '';
        foreach ($this->states as $name => $state) {
            $string .= $state['id'] . ',';
            $i++;
        }
        return $string;
    }
}