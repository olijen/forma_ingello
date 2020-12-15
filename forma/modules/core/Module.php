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

        Yii::debug($_SERVER['REQUEST_URI']);
        Yii::debug(strpos($_SERVER['REQUEST_URI'], '/core/default/confirm'));
        if ($_SERVER['REQUEST_URI'] == '/login' || $_SERVER['REQUEST_URI'] == '/core/site/landing' || $_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/signup' || strpos($_SERVER['REQUEST_URI'], '/core/default/confirm') !== false) {
            return true;
        }

        if (!Yii::$app->user->isGuest || isset($_GET['code'])) {
            return true;
        } else if ($action->actionMethod == 'actionRegularity') {
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

    public function getStateWidget($data)
    {
        return StateView::widget($data);
    }

}
