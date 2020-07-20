<?php

namespace forma\modules\hr;

use Yii;
use yii\helpers\Url;

/**
 * hr module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'forma\modules\hr\controllers';

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
            setcookie(
                "after_login_link",
                $actual_link =
                    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                    . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
            );

            Yii::$app->getResponse()->redirect(Url::to(['/login']));
            return false;
        }
    }
}
