<?php

use yii\db\Migration;

/**
 * Class m211012_125223_add_table_access_interface
 */
class m211012_125223_add_table_access_interface extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('access_interface', [
            'id' => $this->primaryKey(),
            'currentMark' => $this->integer(),
            'rule_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->boolean()
        ]);
        $this->addForeignKey(
            'fk_access_interface_rule_id',
            'access_interface',
            'rule_id',
            'rule',
            'id',
            'SET NULL'
        );
        $this->addForeignKey(
            'fk_access_interface_user_id',
            'access_interface',
            'user_id',
            'user',
            'id',
            'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211012_125223_add_table_access_interface cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211012_125223_add_table_access_interface cannot be reverted.\n";

        return false;
    }
    */
}
