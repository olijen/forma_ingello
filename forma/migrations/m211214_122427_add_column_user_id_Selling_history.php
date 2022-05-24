<?php

use yii\db\Migration;

/**
 * Class m211214_122427_add_column_user_id_Selling_history
 */
class m211214_122427_add_column_user_id_Selling_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('selling_history', 'user_id', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211214_122427_add_column_user_id_Selling_history cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211214_122427_add_column_user_id_Selling_history cannot be reverted.\n";

        return false;
    }
    */
}
