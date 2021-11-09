<?php

use yii\db\Migration;

/**
 * Class m211108_135822_add_column_capacity_warehouse
 */
class m211108_135822_add_column_capacity_warehouse extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('warehouse', 'capacity', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('warehouse', 'capacity');
    }


}
