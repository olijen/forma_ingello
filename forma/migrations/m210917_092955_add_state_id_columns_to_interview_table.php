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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('interview', 'state', $this->integer());
        $this->dropColumn('interview', 'state_id');
    }
}
