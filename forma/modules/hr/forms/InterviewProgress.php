<?php

namespace forma\modules\hr\forms;

use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\hr\services\InterviewService;
use Yii;
use yii\base\Model;

class InterviewProgress extends Model
{

    protected $salesDP;
    /** @var Interview[] */
    protected $models;
    /** @var array */
    protected $states;
    protected $sales;

    //todo: описать назначение класса
    public function __construct()
    {
        parent::__construct();
        $this->salesDP = InterviewService::search()->search([]);
        $this->models = Interview::accessSearch()->models;
        $interviewState = new InterviewState();
        $this->states = ($interviewState::find()->where(['user_id' => Yii::$app->user->getId()])
                ->orderBy('order')->all());
        foreach ($this->states as $state) {
            $this->sales[$state->name] = ['sum' => 0, 'color' => ''];
        }
        foreach ($this->models as $model) {
            if ($model->state_id) {
                $state = $model->getInterviewState()->one();
                $this->sales[$state->name]['sum']++;
                $this->sales[$state->name]['color'] = '';
            }
        }
    }

    public function getColorsString()
    {
        $colorsString = '';

        $green = '"rgba(0, 166, 90, 1)",';
        $yellow = '"rgba(243, 156, 18, 1)",';
        $red =  '"rgba(221, 75, 57, 1)",';

        $first = true;
        if ($this->sales !== null) {
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
        }
        $colorsString .= $green;

        return $colorsString;
    }

    public function getDataString()
    {
        $result = '';
        if ($this->sales !== null) {
            foreach ($this->sales as &$sale) {
                $result .= $sale['sum'] . ',';
            }
        }
        return $result;
    }

    public function getLabelsString()
    {
        $result = '';
        if ($this->sales !== null) {
            foreach ($this->sales as $name => $sale) {
                $result .= '"' . $name . '",';
            }
        }
        return $result;
    }
    public function getStateId()
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