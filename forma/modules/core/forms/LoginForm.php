<?php

namespace forma\modules\core\forms;

use Yii;
use yii\base\Model;
use forma\modules\core\components\UserIdentity;

/**
 * LoginForm is the model behind the login form.
 *
 * @property UserIdentity|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['email', 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError($attribute, 'Неправильный Email');
            } elseif (!$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильный пароль');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if($this->getUser()->confirmed_email == 0){
                return false;
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function googleLogin(){
        $user = $this->getUser();
        if($user->confirmed_email == 0){
            $user->confirmed_email = 1;
            $user->email_string = null;
            $user->save();
        }
        return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
    }

    /**
     * Finds user by [[email]]
     *
     * @return UserIdentity|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserIdentity::findByEmail($this->email);
        }

        return $this->_user;
    }
}
