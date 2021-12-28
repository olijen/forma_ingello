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
            'id_user_profile' => $this->integer(11)->null(),
            'date' => $this->date()->null(),
        ]);
        $this->addForeignKey(
            'fk_rule_rank_id',
            'user_rule_rank',
            'rule_rank_id',
            'rank_rule',
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
