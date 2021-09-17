<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%interview_state}}`.
 */
class m210917_092423_create_interview_state_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%interview_state}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'order' => $this->integer(),
            'user_id' => $this->integer(),
            'description' => $this->char(),
        ]);
        $this->addForeignKey(
            'fk_interview_state-user_id',
            'interview_state',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%interview_state}}');
    }
}
