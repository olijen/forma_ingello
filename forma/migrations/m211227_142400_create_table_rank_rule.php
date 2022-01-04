<?php

use yii\db\Migration;

/**
 * Class m211227_142400_create_table_rank_rule
 */
class m211227_142400_create_table_rank_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rule_rank', [
            'id' => $this->primaryKey(),
            'rule_id' => $this->integer(11)->null(),
            'rank_id' => $this->integer(11)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211227_142400_create_table_rank_rule cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211227_142400_create_table_rank_rule cannot be reverted.\n";

        return false;
    }
    */
}
