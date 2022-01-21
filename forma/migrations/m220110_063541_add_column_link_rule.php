<?php

use yii\db\Migration;

/**
 * Class m220110_063541_add_column_link_rule
 */
class m220110_063541_add_column_link_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rule', 'link', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('rule','link');
    }
}
