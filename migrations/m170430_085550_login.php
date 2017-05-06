<?php

use yii\db\Migration;
use yii\db\Schema;

class m170430_085550_login extends Migration
{
    public function up()
    {
        $this->createTable('login', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'surname' => Schema::TYPE_STRING,
            'password' => Schema::TYPE_STRING,
            'passwordenc' => Schema::TYPE_STRING,
            'username' => Schema::TYPE_STRING,
            'mail' => Schema::TYPE_STRING,
            'balance' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        $this->dropTable('login');
    }

}
