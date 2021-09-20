<?php

use yii\db\Migration;
//
/**
 * Class m210920_113646_cteate_column_date_next_step
 */
class m210920_113646_cteate_column_date_next_step extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('selling','date_next_step','text');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('selling','date_next_step');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210920_113646_cteate_column_date_next_step cannot be reverted.\n";

        return false;
    }
    */
}
