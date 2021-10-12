<?php

use yii\db\Migration;

/**
 * Class m211012_125150_add_table_rule
 */
class m211012_125150_add_table_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rule', [
            'id' => $this->primaryKey(),
            'action' => $this->string(255),
            'model' => $this->string(255),
            'mark' => $this->integer(),
            'item_id' => $this->integer(),
        ]);
        $this->addForeignKey(
          'fk_rule_item_id',
          'rule',
          'item_id',
          'item',
          'id',
          'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211012_125150_add_table_rule cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211012_125150_add_table_rule cannot be reverted.\n";

        return false;
    }
    */
}
