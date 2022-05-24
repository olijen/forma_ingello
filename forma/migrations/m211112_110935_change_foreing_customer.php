<?php

use yii\db\Migration;

/**
 * Class m211112_110935_change_foreing_customer
 */
class m211112_110935_change_foreing_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('alter table customer drop foreign key `customer-country_id_fk`;
                            alter table customer
                            add constraint `customer-country_id_fk`
                            foreign key (country_id) references country (id)
                            on update set null on delete set null;
                            alter table customer drop foreign key coustomer_source_idfk1;

                            alter table customer
                            add constraint coustomer_source_idfk1
                            foreign key (customer_source_id) references customer_source (id)
                            on delete set null;

                            ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {


    }
}
