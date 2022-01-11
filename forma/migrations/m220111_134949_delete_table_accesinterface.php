<?php

use yii\db\Migration;

/**
 * Class m220111_134949_delete_table_accesinterface
 */
class m220111_134949_delete_table_accesinterface extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_profile_rule', 'user_id', $this->integer());
        $this->addForeignKey(
            'fk_user_profile_rule_id',
            'user_profile_rule',
            'user_id',
            'user',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        {

        }
    }



    public function down()
    {
        $this->dropForeignKey(
            'fk_access_interface_rule_id',
            'access_interface'
        );
        $this->dropForeignKey(
            'fk_access_interface_user_id',
            'access_interface'
        );
        $this->dropTable('access_interface');
        $this->dropForeignKey(
            'fk_item_rule_item_interface_id',
            'item_rule'
        );
        $this->dropForeignKey(
            'fk_item_rule_rule_id',
            'item_rule'
        );
        $this->dropTable('item_rule');
        $this->dropForeignKey(
            'fk_user_profile_id',
            'user_profile_rule'
        );


    }
}
