<?php

use yii\db\Migration;

/**
 * Class m211227_141414_create_table_user_profile
 */
class m211227_141414_create_table_user_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'image' => $this->text(255)->null(),
            'user_id' => $this->integer(11)->null(),
            'rank_id' => $this->integer(11)->null(),
        ]);
        $this->addForeignKey(
            'fk_rank_id',
            'user_profile',
            'rank_id',
            'rank',
            'id',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_user_id',
            'user_profile',
            'user_id',
            'user',
            'id',
            'NO ACTION'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211227_141414_create_table_user_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211227_141414_create_table_user_profile cannot be reverted.\n";

        return false;
    }
    */
}
