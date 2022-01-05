<?php

use yii\db\Migration;

/**
 * Class m211208_085638_create_table_selling_history
 */
class m211208_085638_create_table_selling_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('selling_history', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'count' => $this->integer(11),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211208_085638_create_table_selling_history cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211208_085638_create_table_selling_history cannot be reverted.\n";

        return false;
    }
    */
}
