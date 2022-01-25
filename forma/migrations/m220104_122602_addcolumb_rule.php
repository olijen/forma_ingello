<?php

use yii\db\Migration;

/**
 * Class m220104_122602_addcolumb_rule
 */
class m220104_122602_addcolumb_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rule', 'icon', $this->text()->null());
        $this->addColumn('rule', 'rank_id', $this->integer(11)->null());


    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220104_122602_addcolumb_rule cannot be reverted.\n";

        return false;
    }

}
