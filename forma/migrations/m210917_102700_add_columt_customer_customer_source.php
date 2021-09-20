<?php

use yii\db\Migration;

/**
 * Class m210917_102700_add_columt_customer_customer_source
 */
class m210917_102700_add_columt_customer_customer_source extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('customer', 'customer_source_id', $this->integer());
        $this->addForeignKey(
            'coustomer_source_idfk1',
            'customer',
            'customer_source_id',
            'customer_source',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'coustomer_source_idfk1',
            'customer'
        );
        $this->dropColumn('customer', 'customer_source_id');

    }


}
