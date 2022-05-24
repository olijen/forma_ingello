<?php

use yii\db\Migration;

/**
 * Class m220311_125506_alter_default_value_create_at_volunteer
 */
class m220311_125506_alter_default_value_create_at_volunteer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('volunteer', 'created_at', $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220311_125506_alter_default_value_create_at_volunteer cannot be reverted.\n";

        return false;
    }
}
