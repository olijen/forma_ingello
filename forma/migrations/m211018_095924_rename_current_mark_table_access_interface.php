<?php

use yii\db\Migration;

/**
 * Class m211018_095924_rename_current_mark_table_access_interface
 */
class m211018_095924_rename_current_mark_table_access_interface extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('access_interface','currentMark','current_mark');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('access_interface','current_mark','currentMark');
    }
}
