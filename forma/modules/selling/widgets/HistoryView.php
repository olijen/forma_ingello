<?php


namespace forma\modules\selling\widgets;

use yii\base\Widget;

class HistoryView extends Widget
{
    public $model;
    public $talk;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = $this->model;
        $talk = $this->talk === true ? true : null;
        return $this->render('history', compact('model', 'talk'));
    }
}