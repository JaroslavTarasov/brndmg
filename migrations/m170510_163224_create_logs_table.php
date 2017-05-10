<?php

use yii\db\Migration;
use yii\db\Schema;

class m170510_163224_create_logs_table extends Migration
{
    public function up()
    {
        $this->createTable('logs', [
            'operation' => Schema::TYPE_PK,
            'who' => Schema::TYPE_STRING,
            'towhom' => Schema::TYPE_STRING,
            'howmuch' => Schema::TYPE_INTEGER,
            'date' => Schema::TYPE_TIMESTAMP,
        ]);
    }

    public function down()
    {
        $this->dropTable('logs');
    }
}
