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
            [['email', 'password'], 'trim'],
            [['email', 'password'], 'required'],

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

    //todo: можно как то улучшить или хотя бы поменять местами гугл с рефером?
    public function signup($referer = null, $google = false)
    {
        if (!$this->validate()) {
            return false;
        }

        if (strlen($this->username) == 0) {
            $this->username = substr($this->email, 0, strpos($this->email, '@'));
        }

        $user = new UserIdentity;
        $user->setAttributes([
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'parent_id' => $this->parent_id,
            'password' => Yii::$app->getSecurity()->generatePasswordHash($this->password),
        ]);

        if($google){
            $user->setAttribute('confirmed_email', '1');
        }
        else {
            $email_string = Yii::$app->getSecurity()->generateRandomString();
            $user->setAttribute('email_string', $email_string);
            $this->sendStringForEmailConfirm($email_string);
        }

        if ($referer) {
            $user->save();
            return $user->id;
        }

        if ($user->save()) {
            if($google)
                return Yii::$app->user->login($user);
            else
                return Yii::$app->response->redirect('http://'.$_SERVER['HTTP_HOST'].'/core/default/confirm', 301)->send();
        }

        return false;
    }

    public function getRandomPassword(){
        $password = Yii::$app->getSecurity()->generateRandomString();
        $this->sendRandomPassword($password);
        return $password;
    }

    public function sendRandomPassword(string $password){
        Yii::$app->mailer->compose()
            ->setFrom('forma@gmail.com')
            ->setTo($this->email)
            ->setSubject('Пароль на сайте от формы')
            ->setTextBody('Пароль на форму')
            ->setHtmlBody('Ваш пароль: <b>'.$password.'</b>')
            ->send();

    }

    public function sendStringForEmailConfirm(string $email_string){
        //todo: нужно поменять адрес на настоящий сайт, посмотреть на сервер переменные $_SERVER[]
        Yii::$app->mailer->compose()
            ->setFrom('forma@gmail.com')
            ->setTo($this->email)
            ->setSubject('Forma: Подтверждение почты')
            ->setTextBody('Подтвердите пароль, перейдя по ссылке:')
            ->setHtmlBody('Подтвердите пароль, перейдя по ссылке: <a href="http://'.$_SERVER['HTTP_HOST'].'/core/default/confirm?email_string='.$email_string.'">Подтвердить почту</a>')
            ->send();
    }



}
