<?php

use yii\db\Migration;

/**
 * Class m211227_142941_create_table_user_rule_rank
 */
class m211227_142941_create_table_user_rule_rank extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_rule_rank', [
            'id' => $this->primaryKey(),
            'user_profile_id' => $this->integer(11)->null(),
            'rule_rank_id' => $this->integer(11)->null(),
            'date' => $this->date()->null(),
        ]);
        $this->addForeignKey(
            'fk_rule_rank_id',
            'user_rule_rank',
            'rule_rank_id',
            'rule_rank',
            'id',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_user_rule_rank_id',
            'user_rule_rank',
            'user_profile_id',
            'user_profile',
            'id',
            'NO ACTION'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211227_142941_create_table_user_rule_rank cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211227_142941_create_table_user_rule_rank cannot be reverted.\n";

        return false;
    }
    */
}
