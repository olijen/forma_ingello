<?php


namespace forma\modules\core\widgets;


use yii\base\Widget;

class SystemEventWidget extends Widget
{
    public $pages;
    public $searchModel;
    public $systemEventsRows;
    public $timeline;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if($this->timeline) return $this->render('history_event_timeline', [ 'searchModel' => $this->searchModel, 'pages' => $this->pages, 'systemEventsRows' => $this->systemEventsRows]);
        return $this->render('system_event_widget', [ 'searchModel' => $this->searchModel, 'pages' => $this->pages, 'systemEventsRows' => $this->systemEventsRows]);
    }
}