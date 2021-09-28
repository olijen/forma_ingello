<?php

use yii\db\Migration;

/**
 * Class m210923_105308_add_columnt_selling_and_event_hash_for_event
 */
class m210923_105308_add_columnt_selling_and_event_hash_for_event extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('event', 'hash_for_event', $this->char(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('event', 'hash_for_event');
    }
}
