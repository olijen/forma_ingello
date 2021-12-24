<?php

use yii\db\Migration;

/**
 * Class m211217_133111_alter_comment_selling_comment
 */
class m211217_133111_alter_comment_selling_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('selling', 'comment', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('selling','comment');
    }
}
