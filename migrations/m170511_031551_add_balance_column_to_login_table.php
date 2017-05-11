<?php

use yii\db\Migration;

class m170511_031551_add_balance_column_to_login_table extends Migration
{

    public function up()
    {
        $this->addColumn('login', 'balance', $this->float());
    }

    public function down()
    {
        $this->dropColumn('login', 'balance');
    }
}
