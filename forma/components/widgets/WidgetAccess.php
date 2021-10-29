<?php

namespace forma\components\widgets;

use forma\modules\core\records\AccessInterface;
use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\ItemRule;
use yii\bootstrap\Widget;

abstract class WidgetAccess extends Widget
{
    public $id;

    /**
     * @throws \yii\db\Exception
     */
    public function isAccessible(): bool
    {
        $query = \Yii::$app->db->createCommand('select count(*) as answers from access_interface 
                                                    where user_id ='.\Yii::$app->user->id.' and status =1 
                                                    and rule_id in (select rule_id from item_rule 
                                                    where item_interface_id='.$this->id.') having  
                                                    count(*) = (select count(*) from item_rule 
                                                    where item_interface_id='.$this->id.')')->queryOne();

        if ($query == false) {
            return false;
        } else {
            return true;
        }

    }

    abstract function printWidget();

    /**
     * @throws \yii\db\Exception
     */
    public function run()
    {
        if ($this->isAccessible() == true) {
            $this->printWidget();
        }
    }

}

