<?php

namespace forma\modules\hr\forms;

use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\services\InterviewService;
use yii\base\Model;

class InterviewProgress extends Model
{

    protected $salesDP;
    /** @var Interview[] */
    protected $models;
    /** @var array */
    protected $states;
    protected $sales;

    public function __construct()
    {
        parent::__construct();
        $this->salesDP = InterviewService::search()->search([]);
        $this->models = Interview::accessSearch()->models;
        $this->states = (new Interview())->states();
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

        $first = true;
        foreach ($this->sales as &$sale) {
            if ($first) {
                $first = false;
                $lastSale = $sale;
                continue;
            }
            if ($sale['sum'] > $lastSale['sum']) {
                $lastSale['color'] = $red;
            } elseif (($lastSale['sum'] - $sale['sum']) < 1) {
                $lastSale['color'] = $yellow;
            } else {
                $lastSale['color'] = $green;
            }
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