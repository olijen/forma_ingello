<?php

namespace forma\modules\core;

use forma\modules\core\widgets\StateView;

/**
 * user module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'forma\modules\core\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function getStateWidget($data)
    {
        return StateView::widget($data);
    }

}
