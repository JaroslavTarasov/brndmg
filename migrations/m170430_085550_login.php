<?php

use yii\db\Migration;

class m170430_085550_login extends Migration
{
    public function up()
    {
        $this->createTable('login', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'surname' => Schema::TYPE_STRING,
            'password' => Schema::TYPE_STRING,
            'username' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
