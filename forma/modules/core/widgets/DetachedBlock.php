<?php

namespace forma\modules\core\widgets;

use yii\base\Widget;

class DetachedBlock extends Widget
{
    public $header = false;
    public $example = 'Блок';

    protected $_title = '';

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        return $this->render('detached-block', [
            'content' =>  ob_get_clean(),
            'header' => $this->header,
            'example' => $this->example,
        ]);
    }
}
