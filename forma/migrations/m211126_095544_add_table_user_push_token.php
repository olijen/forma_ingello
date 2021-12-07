<?php

use yii\db\Migration;

/**
 * Class m211126_095544_add_table_user_push_token
 */
class m211126_095544_add_table_user_push_token extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_push_token', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->null(),
            'token' => $this->string(255)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ]);
        $this->addForeignKey(
            'fk-user-token',
            'user_push_token',
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
        $this->dropForeignKey('fk-user-token', 'user_push_token');
        $this->dropTable('user_push_token');
    }
}
