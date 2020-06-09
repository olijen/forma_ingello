<?php


namespace forma\modules\core\widgets;


use yii\base\Widget;

class WorkersWidget extends Widget
{
    public $searchModelWorkers;
    public $dataProviderWorkers;
    public $tableView;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        if($this->tableView) return $this->render('workers_table', ['dataProviderWorkers' => $this->dataProviderWorkers,
            'searchModelWorkers' => $this->searchModelWorkers]);
        return $this->render('workers', ['dataProviderWorkers' => $this->dataProviderWorkers,
            'searchModelWorkers' => $this->searchModelWorkers]);
    }
}