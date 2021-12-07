<?php

use yii\db\Migration;

/**
 * Class m211206_101540_add_column_selling_product_purchase_cost
 */
class m211206_101540_add_column_selling_product_purchase_cost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('selling_product', 'purchase_cost', $this->decimal(18,2)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('selling_product','purchase_cost');
    }

}
