<?php

namespace forma\modules\selling\widgets;

use yii\base\Widget;

class Dialog extends  Widget
{
    public $requestSearch;
    public $model;
    public $sellingId;
    public $customer;
    public $customAnswer;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return  $this->render('dialog', [
            'requestSearch' =>$this->requestSearch,
            'model' => $this->model,
            'sellingId' => $this->sellingId,
            'customer' => $this->customer,
            'customAnswer' => $this->customAnswer,
        ]);
    }

}