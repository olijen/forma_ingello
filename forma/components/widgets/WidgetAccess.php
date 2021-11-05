<?php

namespace forma\components\widgets;

use forma\modules\core\records\AccessInterface;
use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\ItemRule;
use yii\bootstrap\Widget;

class WidgetAccess extends Widget
{
    public $accessName;
    public $rules;
    /**
     * @throws \yii\db\Exception
     */
    public function isAccessible(): bool
    {

        $query = ItemInterface::find()->where(['name_item' => $this->accessName])
            ->joinWith(['itemRules' => function ($q) {
                $q->joinWith(['rule' => function ($q) {
                    $q->joinWith('accessInterfaces');
                }]);
            }])->all();
        $userId = \Yii::$app->user->id;
        $countItemRule = count($query[0]->itemRules);
        $countUserAnswer = 0;
        foreach ($query[0]->itemRules as $itemRule) {
            $this->rules[] =$itemRule->rule->rule_name.' ';
            foreach ($itemRule->rule->accessInterfaces as $accessInterface) {
                if ($accessInterface->user_id == $userId && $accessInterface->status == 1) {
                    $countUserAnswer++;

                }
            }
        }
        if ($countItemRule == $countUserAnswer) {
            return true;
        } else {
            return false;
        }

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
        if ($this->isAccessible() == true) {
            echo $content;
        } else {
            echo "Выполните задание:<br/>";
            foreach ($this->rules as $rule){
                echo "$rule <br/>";
            }
            echo "После откроется доступ $this->accessName";
        }
    }

}

