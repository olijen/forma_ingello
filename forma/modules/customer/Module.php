<?php

namespace forma\modules\customer;

use Yii;
use yii\helpers\Url;

/**
 * customer module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'forma\modules\customer\controllers';

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
            Yii::$app->getResponse()->redirect(Url::to(['/']));
            return false;
        }
    }
}
