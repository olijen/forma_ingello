<?php

use yii\db\Migration;

/**
 * Class m211013_140530_add_table_rule_item
 */
class m211013_140530_add_table_rule_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('item_rule', [
            'id' => $this->primaryKey(),
            'rule_id'=>$this->integer(),
            'item_interface_id'=>$this->integer(),
        ]);
        $this->addForeignKey(
            'fk_item_rule_rule_id',
            'item_rule',
            'rule_id',
            'rule',
            'id',
            'SET NULL'
        );
        $this->addForeignKey(
            'fk_item_rule_item_interface_id',
            'item_rule',
            'item_interface_id',
            'item_interface',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_item_rule_item_interface_id','element_rule');
        $this->dropForeignKey('fk_item_rule_rule_id','item_rule');
        $this->dropTable('item_rule');

    }
}
