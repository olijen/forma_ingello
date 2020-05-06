<?php


namespace forma\modules\selling\widgets;

use yii\base\Widget;

class HistoryView extends Widget
{
    public $model;
    public $talk;
    public $history;
    public $onlyDialog = null;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = $this->model;
        $talk = $this->talk === true ? true : null;
        $history = $this->history === true ? true : null;
        if ($this->onlyDialog) return $this->render('history_dialog', compact('model', 'talk'));
        return $this->render('history', compact('model', 'talk', 'history'));
    }
}