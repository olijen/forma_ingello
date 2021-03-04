<?php

namespace forma\modules\selling;

use Yii;
use yii\debug\models\Router;
use yii\helpers\Url;

/**
 * selling module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'forma\modules\selling\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }


    //todo: оптимизировать часть кода, где можно дать доступ неавторизавнному пользоваетлю
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!Yii::$app->user->isGuest) {
            return true;
        } else if($action->actionMethod == 'actionShowSelling' || $action->actionMethod == 'actionCommentHistory'
        || $action->actionMethod == 'actionEditCell' || $action->actionMethod == 'actionDeletePosition'
            || $action->actionMethod == 'actionAddPosition' || $action->actionMethod == 'actionValidate'
            || $action->actionMethod == 'actionChangeSellingProductCost'){
            Yii::debug($action->actionMethod);
            return true;
        } else {
            setcookie(
                "after_login_link",
                $actual_link =
                    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                    . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
            );

            Yii::$app->getResponse()->redirect(Url::to(['/']));
            return false;
        }
    }
}
