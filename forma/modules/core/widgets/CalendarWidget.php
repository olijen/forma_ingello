<?php

namespace forma\modules\core\widgets;


use yii\base\Widget;

class CalendarWidget extends Widget
{
    public $JSCode;
    public $JSEventClick;
    public $JSEventResize;
    public $JSEventDrop;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('calendar', [
            "JSCode" => $this->JSCode,
            "JSEventClick" => $this->JSEventClick,
            "JSEventResize" => $this->JSEventResize,
            "JSEventDrop" => $this->JSEventDrop
        ]);
    }
}