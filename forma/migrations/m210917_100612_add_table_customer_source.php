<?php

use yii\db\Migration;

/**
 * Class m210917_100612_add_table_customer_source
 */
class m210917_100612_add_table_customer_source extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer_source', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'order' => $this->integer(),
            'description' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customer_source');
    }

}
