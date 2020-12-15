<?php

namespace forma\modules\supplier;

use Yii;
use yii\helpers\Url;

/**
 * supplier module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'forma\modules\supplier\controllers';

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
        } else {
            Yii::$app->getResponse()->redirect(Url::to(['/signup']));
            return false;
        }
    }
}
