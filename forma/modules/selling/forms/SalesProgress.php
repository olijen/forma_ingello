<?php

namespace forma\modules\selling\forms;

use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\services\SellingService;
use yii\base\Model;

class SalesProgress extends Model
{

    protected $salesDP;
    /** @var Selling[] */
    protected $models;
    /** @var array */
    protected $states;
    protected $sales;

    public function __construct()
    {
        parent::__construct();
        $this->salesDP = SellingService::search()->search([]);
        $this->models = $this->salesDP->models;
        $this->states = (new Selling())->states();
        foreach ($this->states as $state) {
            $state = new $state();
            $this->sales[$state->getName()] = ['sum' => 0, 'color' => ''];
        }
        foreach ($this->models as $model) {
            $this->sales[$model->getState()->getName()]['sum'] ++;
            $this->sales[$model->getState()->getName()]['color'] = '';
        }
    }

    public function getColorsString()
    {
        $colorsString = '';

        $green = '"rgba(0, 166, 90, 1)",';
        $yellow = '"rgba(243, 156, 18, 1)",';
        $red =  '"rgba(221, 75, 57, 1)",';

        $lastSale = false;
        foreach ($this->sales as &$sale) {
            if (!$lastSale) {
                $lastSale = $sale;
                continue;
            }

            if ($sale['sum'] > $lastSale['sum']) {
                $lastSale['color'] = $red;
            } elseif ( $lastSale['sum'] == ($sale['sum'])) {
                $lastSale['color'] = $yellow;
            } else {
                $lastSale['color'] = $green;
            }@$e[]=$lastSale['color'];
            $colorsString .= $lastSale['color'];
            $lastSale = $sale;
        }
        $colorsString .= $green;

        return $colorsString;
    }

    public function getDataString()
    {
        $result = '';

        foreach ($this->sales as &$sale) {
            $result .= $sale['sum'].',';
        }

        return $result;
    }

    public function getLabelsString()
    {
        $result = '';

        foreach ($this->sales as $name => $sale) {
            $result .= '"'.$name.'",';
        }

        return $result;
    }
}