<?php

use yii\db\Migration;

/**
 * Class m210921_112120_table_template
 */
class m210921_112120_table_template extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('template', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'content' => $this->text(),
            'theme' => $this->text(),
            'user' => $this->text(255),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210921_112120_table_template cannot be reverted.\n";

        return false;
    }
    */
}
