<?php

use yii\db\Migration;

/**
 * Class m210920_085533_update_column_selling_warehouse_id_null
 */
class m210920_085533_update_column_selling_warehouse_id_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('selling', 'warehouse_id', $this->integer(11)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210920_085533_update_column_selling_warehouse_id_null cannot be reverted.\n";
        $this->alterColumn('selling', 'warehouse_id', $this->integer(11)->notNull());
    }
}
