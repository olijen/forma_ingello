<?php

use yii\db\Migration;

/**
 * Class m220112_074359_delete_column_user_profile_rule
 */
class m220112_074359_delete_column_user_profile_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('user_profile_rule','user_profile_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
