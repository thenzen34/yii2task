<?php

use yii\db\Migration;

class m170322_082917_create_dump_db extends Migration
{
    public function safeUp()
    {
        $this->execute(file_get_contents('dump.sql'));
    }

    public function safeDown()
    {
        echo "m170322_082917_create_dump_db cannot be reverted.\n";

        return false;
    }

}
