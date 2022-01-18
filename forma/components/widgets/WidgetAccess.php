<?php

namespace forma\components\widgets;

use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\Rank;
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
        $this->user = User::find()->where(['id' => \Yii::$app->user->id])->one();
        $needArrayRuleCount = [];
        foreach ($itemInterface->rank->rules as $rule) {
            $needArrayRuleCount [$rule->id] = $rule->count_action;
        }
        $currentArrayRuleCount = [];
        $rank = Rank::find()->where(['id' => $itemInterface->rank_id])->one()->rules;
        foreach ($rank as $rule) {
            $currentArrayRuleCount[$rule->id] = count($rule->userProfileRules);
        }
        $countNeed = count($needArrayRuleCount);
        $countCurrent = 0;
        foreach ($needArrayRuleCount as $keyNeed => $needItem) {
            foreach ($currentArrayRuleCount as $keyCurrent => $currentItem) {
                if ($keyNeed == $keyCurrent) {
                    if ($needItem == $currentItem) {
                        $countCurrent++;
                    }
                }
            }
        }

        if ($countCurrent == $countNeed) {
            return true;
        }
        $rules = Rule::find()->where(['rank_id' => $itemInterface->rank_id])->all();
        foreach ($rules as $rule) {
            $this->rules .= $rule->rule_name . ' (' . $countCurrent . ' из ' . $countNeed . ');';
        }
        $allInterfaces = \Yii::$app->params['access-interface'][$this->module];
        foreach ($allInterfaces as $key => $interface) {
            if ($key == $this->key) {
                $this->interface .= $interface . '; ';
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
        $str = str_replace(' ', '-', $this->key);
        $spanElement = "<div style='display: inline-block;'  id ='$str'>$content</div>";
        if (isset(User::find()->where(['id' => \Yii::$app->user->id])->one()->userProfile)) {
            if ($this->isAccessible() == true) {
                echo $spanElement;
            } else {
                echo "<div style='display: inline-block' class='hover-info' title='Выполните задание: $this->rules. После откроется доступ: $this->interface'><i class='fa fa-info '></i><br/></div>";
            }
        } else {
            echo $content;
        }

    }

}

