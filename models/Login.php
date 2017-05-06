<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "login".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $passwordenc
 * @property string $username
 * @property string $balance
 */
class Login extends \yii\db\ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'login';
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'username', 'mail', 'passwordenc'], 'string', 'max' => 128],
            [['password'], 'string', 'max' => 16],
            [['balance'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'passwordenc' => 'Passwordenc',
            'password' => 'Password',
            'username' => 'Username',
            'mail' => 'Mail',
            'balance' => 'Balance'
        ];
    }


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        throw new NotSupportedException();
    }


    public function validateAuthKey($authKey)
    {
        throw new NotSupportedException();
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passwordenc);
    }

    public function setPassword($password)
    {
        $this->passwordenc = Yii::$app->security->generatePasswordHash($password);
    }

}
