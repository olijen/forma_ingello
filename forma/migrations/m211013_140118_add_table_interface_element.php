<?php

use yii\db\Migration;

/**
 * Class m211013_140118_add_table_interface_element
 */
class m211013_140118_add_table_interface_element extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('item_interface', [
        'id' => $this->primaryKey(),
        'name_item' => $this->string(255),
        'id_item' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('item_interface');
    }
}
