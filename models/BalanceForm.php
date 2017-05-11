<?php

namespace app\models;

use app\models\Login;
use Faker\Provider\DateTime;
use yii\base\Model;
use Yii;
use yii\db\Exception;


class BalanceForm extends Model
{
    public $balance;
    public $username;


    public function attributeLabels()
    {
        return [
            'balance' => 'Сумма',
            'username' => 'Кому отправить',
        ];
    }

    public function rules()
    {
        return [

            ['balance','number', 'min' => 0],
            ['username', 'required'],
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
            if ($desc->balance >= $this->balance) {
                $desc->balance -= $this->balance;
                $desc->save();
                $inc = Login::findOne(['username' => Yii::$app->request->post($this->username)]);
                $inc->balance += $this->balance;
                $inc->save();
                $log = new Logs();
                $log->howmuch = $this->balance;
                $log->who = $desc->username;
                $log->towhom = $inc->username;
                $log->date = new \yii\db\Expression('NOW()');
                $log->save();
            } else {
                throw new Exception('I try to send more than I have');
            }
            return $desc && $inc && $log;
        }
        return 0;
    }
}