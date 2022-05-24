<?php

use yii\db\Migration;

/**
 * Class m211115_140721_add_column_currency_id_transit_product
 */
class m211115_140721_add_column_currency_id_transit_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('transit_product', 'currency_id', $this->integer(11)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('transit_product','currency_id');
    }

}
