<?php


namespace forma\modules\core\widgets;

use yii\base\Widget;

class ApplicationInfoWidget extends Widget
{

    public $completeSellingsCount;
    public $productsCount;
    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('application_info', ['completeSellingsCount' => $this->completeSellingsCount,
            'productsCount' => $this->productsCount]);
    }
}