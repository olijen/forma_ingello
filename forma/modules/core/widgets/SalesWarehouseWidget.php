<?php


namespace forma\modules\core\widgets;


use yii\base\Widget;

class SalesWarehouseWidget extends Widget
{
    public $sellingInWarehouse;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('sales_warehouse', ['sellingInWarehouse' => $this->sellingInWarehouse]);
    }
}