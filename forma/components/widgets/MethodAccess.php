<?php

namespace forma\components\widgets;

use forma\modules\core\records\AccessInterface;
use forma\modules\core\records\ItemInterface;
use yii\bootstrap\Widget;

class MethodAccess extends Widget
{
    public $id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $itemsInterface = ItemInterface::find()->where(['id_item' => $this->id])->one();
        $rule_id = [];

        foreach ($itemsInterface->itemRules as $rule) {
            $rule_id[] = $rule->rule_id;
        }

        $accessInterface = AccessInterface::find()->where(['user_id' => \Yii::$app->user->id, 'status' => 1])
            ->where(['in', 'rule_id', $rule_id])->all();
        $answers = [];

        foreach ($accessInterface as $value) {
            if ($value->status == 0) {
                $answers[] = false;
            } else {
                $answers[] = true;
            }
        }

        if (in_array(false, $answers) == true) {
            echo "<script>
                let all = document.getElementsByClassName('selling-index');
                for (let i = 0; i < all.length; i++) {
                  all[i].style.display = 'none';
                }
                </script>";
        }
    }
}

