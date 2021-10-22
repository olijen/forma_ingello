<?php

use yii\db\Migration;

/**
 * Class m211022_134800_add_column_name_rule_table_rule
 */
class m211022_134800_add_column_name_rule_table_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rule', 'rule_name', $this->char(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('rule', 'rule_name');
    }

}
