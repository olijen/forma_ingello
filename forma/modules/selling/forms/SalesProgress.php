<?php

namespace forma\modules\selling\forms;

use forma\modules\sellinghistory\records\SellingHistory;
use Yii;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\services\SellingService;
use forma\modules\selling\records\state\State;
use yii\base\Model;

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
            ->all();;

            $this->sellinghistory = SellingHistory::find()->all();

        // перебиваем состояния и находим в какой продаже они находятся
        foreach ($this->states as $state) {
            $this->sales[$state->id] = ['sum' => 0, 'color' => ''];
        }

        //мы находим каких состояний сколько
        foreach ($this->models as $model) {
            Yii::debug($model->id . ' - id; ' . $model->state_id);
            if(isset($this->sales[$model->state_id]))
            if ($model->state_id !== null) {
                $this->sales[$model->state_id]['sum']++;
            }
        }
        $this->getLabelsString();

    }

    public function getColorsString()
    {
        $colorsString = '';

        $green = '"rgba(0, 166, 90, 1)",';
        $yellow = '"rgba(243, 156, 18, 1)",';
        $red = '"rgba(221, 75, 57, 1)",';

        $lastSale = false;
      if ($this->sales){
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
            foreach ($this->sales as &$sale) {
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

    public function getDate()
    {
        $result = '';

        foreach ($this->sellinghistory as $date) {

            $result .= '"' . $date['date'] . '",';
        }
        return $result;
    }

    public function getCount()
    {
        $result = '';

        foreach ($this->sellinghistory as $count) {

            $result .= '"' . $count['count'] . '",';
        }
        return $result;
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