<?php

use yii\db\Migration;

/**
 * Class m181105_125632_customer_fix
 */
class m181105_125632_customer_fix extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('customer', 'contact_name');
        $this->dropColumn('customer', 'address');
        $this->dropColumn('customer', 'email');
        $this->dropColumn('customer', 'phone');


        $this->addColumn('customer', 'name', $this->string(100) );
        $this->addColumn('customer', 'firm',  $this->string(100));
        $this->addColumn('customer', 'address',  $this->string(32) );
        $this->addColumn('customer', 'company_email',  $this->string(32));
        $this->addColumn('customer', 'chief_email',  $this->string(32));
        $this->addColumn('customer', 'company_phone',  $this->string(32));
        $this->addColumn('customer', 'chief_phone',  $this->string(32));
        $this->addColumn('customer', 'site_company',  $this->string(32));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181105_125632_customer_fix cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181105_125632_customer_fix cannot be reverted.\n";

        return false;
    }
    */
}
