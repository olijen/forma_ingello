<?php

use yii\db\Migration;

/**
 * Class m210929_130935_delete_column_selling_date_next_step
 */
class m210929_130935_delete_column_selling_date_next_step extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropColumn('selling','date_next_step');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210929_130935_delete_column_selling_date_next_step cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_130935_delete_column_selling_date_next_step cannot be reverted.\n";

        return false;
    }
    */
}
