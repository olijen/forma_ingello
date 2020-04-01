<?php

namespace forma\modules\core\forms;

use yii\base\Model;
use forma\modules\core\components\UserIdentity;
use Yii;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $phone;
    public $parent_id;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'trim'],
            [['username', 'email', 'password'], 'required'],

            ['username', 'unique', 'targetClass' => UserIdentity::className(), 'message' => 'Данный логин уже занят.'],
            ['email', 'unique', 'targetClass' => UserIdentity::className(), 'message' => 'Данный email уже занят.'],

            ['email', 'email'],

            ['username', 'string', 'min' => 1, 'max' => 255],
            ['email', 'string', 'max' => 255],
            ['phone', 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
            ['parent_id', 'integer'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'email' => 'E-mail',
            'phone' => 'Моб. номер',
            'parent_id' => 'Реферал',
        ];
    }

    public function signup($referer = null)
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new UserIdentity;
        $user->setAttributes([
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'parent_id' => $this->parent_id,
            'password' => Yii::$app->getSecurity()->generatePasswordHash($this->password),
        ]);

        if ($referer) {
            $user->save();
            return $user->id;
        }

        if ($user->save()) {

            return Yii::$app->user->login($user);
        }

        return false;
    }

    public function getRandomPassword(){
        $passwords = ["qwerty", "asdfgh", "zxcvbn"];
        $index = rand(0, 2);
        return $passwords[$index];
    }


}
