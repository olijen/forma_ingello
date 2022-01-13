<?php

namespace forma\components\widgets;

use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\Rule;
use forma\modules\core\records\User;
use yii\bootstrap\Widget;

class WidgetAccess extends Widget
{
    public $module;
    public $key;
    public $rules;
    public $user;
    /**
     * @throws \yii\db\Exception
     */
    public function isAccessible(): bool
    {
        $itemInterface = ItemInterface::find()->where(['module' => $this->module, 'key' => $this->key])->one();
        if (!isset($itemInterface)) {
            return false;
        }
        $this->user = User::find()->where(['id' => \Yii::$app->id])->one();
        $needBall = count($itemInterface->rank->getRules()->all());
        $currentBall = count($this->user->getUserProfileRules()->all());
        if ($needBall == $currentBall) {
            return true;
        }
        return false;
    }

    public function init()
    {
        parent::init();
        ob_start();
    }

    /**
     * @throws \yii\db\Exception
     */
    public function run()
    {
        $content = ob_get_clean();
        if (!isset($this->user->userProfile)) {
            if ($this->isAccessible() == true) {
                echo $content;
            } else {
                echo "Выполните задание:<br/>";

                echo "После откроется доступ";
            }
        } else {
            echo $content;
        }

    }

}

