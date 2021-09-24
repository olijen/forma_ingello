<?php

use yii\db\Migration;

/**
 * Class m210917_103413_add_columt_event_sseling_id
 */
class m210917_103413_add_columt_event_sseling_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('event', 'selling_id', $this->integer());
        $this->addForeignKey(
            'selling_id_idfk1',
            'event',
            'selling_id',
            'selling',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'selling_id_idfk1',
            'event'
        );
        $this->dropColumn('event', 'selling_id');
    }


}
