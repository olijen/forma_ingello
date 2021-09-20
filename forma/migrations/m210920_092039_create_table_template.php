<?php

use yii\db\Migration;

/**
 * Class m210920_092039_create_table_template
 */
class m210920_092039_create_table_template extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('template', [
            'id' => $this->primaryKey(),
            'name' => $this->text(255),
            'content' => $this->text(255),
            'theme' => $this->text(255),
            'user' => $this->text(255),
        ]);
    }

        /**
         * {@inheritdoc}
         */

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('template');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210920_092039_create_table_template cannot be reverted.\n";

        return false;
    }
    */
}
