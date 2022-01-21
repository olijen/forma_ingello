<?php

use yii\db\Migration;

/**
 * Class m220120_133220_add_column_strategy_is_selling
 */
class m220120_133220_add_column_strategy_is_selling extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('strategy', 'is_selling', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('strategy', 'is_selling');
    }

}
