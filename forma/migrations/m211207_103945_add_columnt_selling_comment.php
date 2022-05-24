<?php

use yii\db\Migration;

/**
 * Class m211207_103945_add_columnt_selling_comment
 */
class m211207_103945_add_columnt_selling_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('selling', 'comment', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('selling','comment');
    }
}
