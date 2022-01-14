<?php

namespace forma\components\widgets;

use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\Rule;
use forma\modules\core\records\User;
use yii\bootstrap\Widget;
use function Clue\StreamFilter\fun;

class WidgetAccess extends Widget
{
    public $module;
    public $key;
    public $rules;
    public $user;
    public $interface;
    /**
     * @throws \yii\db\Exception
     */
    public function isAccessible(): bool
    {
        $itemInterface = ItemInterface::find()->where(['key' => $this->key, 'module' => $this->module])->one();
        if (!isset($itemInterface->rank)) {
            return true;
        }
        $this->user = User::find()->where(['id' => \Yii::$app->id])->one();
        $needBall = isset($itemInterface->rank->rules) ? count($itemInterface->rank->rules) : 0;
        $currentBall = isset($this->user->userProfileRules) ? count($this->user->userProfileRules) : 0;
        if ($needBall == $currentBall) {
            return true;
        }
        $rules = Rule::find()->where(['rank_id' => $itemInterface->rank_id])->all();
        foreach ($rules as $rule){
            $this->rules .= $rule->rule_name.'; ';
        }
        $allInterfaces = \Yii::$app->params['access-interface'][$this->module];
        foreach ($allInterfaces as $key => $interface){
            if($key == $this->key){
                $this->interface .= $interface.'; ';
            }

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
                echo "<br/><div class='hover-info' title='Выполните задание: $this->rules. После откроется доступ: $this->interface'><i class='fa fa-info '></i><br/></div>";
            }
        } else {
            echo $content;
        }

    }

}

