<?php

namespace forma\modules\core;

use forma\modules\core\widgets\StateView;
use Yii;
use yii\helpers\Url;

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

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!Yii::$app->user->isGuest) {
            return true;
        } else if($action->actionMethod == 'actionRegularity'){
            return true;
        } else {
            Yii::$app->getResponse()->redirect(Url::to(['/login']));
            return false;
        }
    }

    public function getStateWidget($data)
    {
        return StateView::widget($data);
    }

}
