<?php

use yii\db\Migration;

/**
 * Class m220111_140557_add_key_item_interface_alter_column
 */
class m220111_140557_add_key_item_interface_alter_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('item_interface','rank_id',$this->integer(11)->null());
        $this->addForeignKey(
            'fk-rank-to-item-interface',
            'item_interface',
            'rank_id',
            'rank',
            'id',
            'NO ACTION');
        $this->dropColumn('item_interface','name_item');
        $this->dropColumn('item_interface','id_item');
        $this->addColumn('item_interface','module',$this->text()->null());
        $this->addColumn('item_interface','key',$this->text()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
