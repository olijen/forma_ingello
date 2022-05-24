<?php

use yii\db\Migration;

/**
 * Class m211111_112945_add_colums_transit_product_cost_with_warehouse_product
 */
class m211111_112945_add_colums_transit_product_cost_with_warehouse_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('transit_product', 'purchase_cost', $this->double(10.2)->null());
        $this->addColumn('transit_product', 'recommended_cost', $this->double(10.2)->null());
        $this->addColumn('transit_product', 'consumer_cost', $this->double(10.2)->null());
        $this->addColumn('transit_product', 'trade_cost', $this->double(10.2)->null());
        $this->addColumn('transit_product', 'tax', $this->double(10.2)->null());
        $this->addColumn('transit_product', 'overhead_cost', $this->double(10.2)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('transit_product', 'purchase_cost');
        $this->dropColumn('transit_product', 'recommended_cost');
        $this->dropColumn('transit_product', 'consumer_cost');
        $this->dropColumn('transit_product', 'trade_cost');
        $this->dropColumn('transit_product', 'tax');
        $this->dropColumn('transit_product', 'overhead_cost');
    }

}
