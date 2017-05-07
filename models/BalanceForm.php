<?php

namespace app\models;

use app\models\Login;
use yii\base\Model;
use Yii;

class BalanceForm extends Model
{
    public $balance;


    public function attributeLabels()
    {
        return [
            'balance' => 'Balance',
        ];
    }

    public function rules()
    {
        return [
            ['balance', 'filter', 'filter' => 'trim'],
            ['balance', 'integer'],
        ];
    }

    public function increase()
    {
        if ($this->validate()) {
            $user = Login::findOne(Yii::$app->user->getId());
            $user->balance += $this->balance;
            $user->save();

            return $user;
        }
        return 0;
    }
}