<?php

namespace app\models;

use app\models\Login;
use yii\base\Model;
use Yii;

class BalanceForm extends Model
{
    public $balance;
    public $username;


    public function attributeLabels()
    {
        return [
            'balance' => 'Balance',
            'username' => 'Username',
        ];
    }

    public function rules()
    {
        return [
            ['balance', 'filter', 'filter' => 'trim'],
            ['balance', 'integer', 'min' => 0],
            ['balance', 'safe'],

            //['username', 'unique', 'targetClass' => '\app\models\Login', 'message' => 'Username exists already. Try another'],
        ];
    }

    public function increase()
    {
        if ($this->validate()) {
            $bal = Login::findOne(Yii::$app->user->getId());
            $bal->balance += $this->balance;
            $bal->save();

            return $bal;
        }
        return 0;
    }


    public function sendbal()
    {
        if ($this->validate()) {
            $desc = Login::findOne(Yii::$app->user->getId());
            $desc->balance -= $this->balance;
            $desc->save();
            $inc = Login::findOne(['username' => Yii::$app->request->post($this->username)]);
            $inc->balance += $this->balance;
            $inc->save();
        }
    }
}