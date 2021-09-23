<?php

use yii\db\Migration;

/**
 * Class m210921_112120_table_template
 */
class m210922_000001_drop_old_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('request_strategy_old');
        $this->dropTable('project_vacancy_old');
    }
}
