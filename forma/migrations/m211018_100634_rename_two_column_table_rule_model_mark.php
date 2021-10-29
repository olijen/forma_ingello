<?php

use yii\db\Migration;

/**
 * Class m211018_100634_rename_two_column_table_rule_model_mark
 */
class m211018_100634_rename_two_column_table_rule_model_mark extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('rule','model','table');
        $this->renameColumn('rule','mark','count_action');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('rule','table','model');
        $this->renameColumn('rule','count_action','mark');
    }
}
