<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%interview}}`.
 */
class m210917_092955_add_state_id_columns_to_interview_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('interview', 'state');
        $this->addColumn('interview', 'state_id', $this->integer());
        $this->addForeignKey(
          'fk_state_id-interview_state',
          'interview',
          'state_id',
          'interview_state',
          'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('state_id', 'interview_state');
        $this->addColumn('interview', 'state', $this->integer());
        $this->dropColumn('interview', 'state_id');
    }
}
