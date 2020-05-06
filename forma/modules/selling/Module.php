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

    public function beforeAction($action)
    {

        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!Yii::$app->user->isGuest) {
            return true;
        } else if($action->actionMethod == 'actionShowSelling' || $action->actionMethod == 'actionCommentHistory'
            || $action->actionMethod == 'actionEditCell'){
            return true;
        } else {
            Yii::$app->getResponse()->redirect(Url::to(['/login']));
            return false;
        }
    }
}
