<?php

namespace app\models;

use app\models\Login;
use yii\base\Model;
use Yii;

class SignupForm extends Model
{
    public $username;
    public $password;

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 128],
            ['username', 'unique', 'targetClass' => '\app\models\Login', 'message' => 'Username exists already. Try another'],
            [['password'], 'string', 'max' => 16],
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new Login();
            $user->username = $this->username;
            $user->password = $this->password;
            $user->save();

            return $user;
        }
        return 0;
    }
}