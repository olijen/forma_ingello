<?php

use yii\db\Migration;

/**
 * Class m211227_140807_create_table_rank
 */
class m211227_140807_create_table_rank extends Migration
{
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */    public function safeUp()
{
    $this->createTable('rank', [
        'id' => $this->primaryKey(),
        'name' => $this->text(255)->null(),
        'image' => $this->text(255)->null(),
        'order' => $this->integer(11)->null(),
    ]);
}

    public function safeDown()
    {
        echo "m211227_140807_create_table_rank cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211227_140807_create_table_rank cannot be reverted.\n";

        return false;
    }
    */
}
