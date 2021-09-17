<?php

use yii\db\Migration;

class m171008_182007_base extends Migration
{
    public function safeUp()
    {
        $dumpPath = __DIR__ . '/data/dump.sql';
        $dump = file_get_contents($dumpPath);
        return $this->execute($dump);
    }

    public function safeDown()
    {
        echo "m171008_182007_base cannot be reverted.\n";
        return false;
    }
}

