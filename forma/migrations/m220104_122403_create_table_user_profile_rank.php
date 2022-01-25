<?php

use yii\db\Migration;

/**
 * Class m220104_122403_create_table_user_profile_rank
 */
class m220104_122403_create_table_user_profile_rank extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_profile_rule', [
            'id' => $this->primaryKey(),
            'rule_id' => $this->integer(11)->null(),
            'user_profile_id' => $this->integer(11)->null(),
            'date' => $this->date()->null(),
        ]);
        $this->addForeignKey(
            'fk_user_profile_id',
            'user_profile_rule',
            'user_profile_id',
            'user_profile',
            'id',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_rule_id',
            'user_profile_rule',
            'rule_id',
            'rule',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220104_122403_create_table_user_profile_rank cannot be reverted.\n";

        return false;
    }


}
