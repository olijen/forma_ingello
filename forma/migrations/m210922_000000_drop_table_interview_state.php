<?php

use yii\db\Migration;

/**
 * Class m210921_112120_table_template
 */
class m210922_000000_drop_table_interview_state extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('interview_vacancy');
    }
}
