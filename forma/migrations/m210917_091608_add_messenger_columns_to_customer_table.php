<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%customer}}`.
 */
class m210917_091608_add_messenger_columns_to_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('customer', 'viber', $this->char(255));
        $this->addColumn('customer', 'telegram', $this->char(255));
        $this->addColumn('customer', 'skype', $this->char(255));
        $this->addColumn('customer', 'whatsapp', $this->char(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('customer', 'viber');
        $this->dropColumn('customer', 'telegram');
        $this->dropColumn('customer', 'whatsapp');
        $this->dropColumn('customer', 'skype');

    }
}
