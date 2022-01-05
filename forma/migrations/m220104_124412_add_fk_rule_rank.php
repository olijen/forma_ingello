<?php

use yii\db\Migration;

/**
 * Class m220104_124412_add_fk_rule_rank
 */
class m220104_124412_add_fk_rule_rank extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_rank_rule_id',
            'rule',
            'rank_id',
            'rank',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220104_124412_add_fk_rule_rank cannot be reverted.\n";

        return false;
    }


}
