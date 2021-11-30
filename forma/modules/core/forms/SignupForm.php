<?php

namespace forma\modules\core\forms;

use forma\modules\core\controllers\SiteController;
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
    public $confirmed_email;

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

    //todo: ОСТОРОЖНО КОСТЫЛЬ
    //ОБЯЗАТЕЛЬНО К ПРОЧТЕНИЮ КОММЕНТАРИИ В ЭТОМ МЕТОДЕ, ПРЕЖДЕ ЧЕМ РЕДАКТИРОВАТЬ ЕГО
    //НЕ МЕНЯТЬ РЕАЛИЗАЦИЮ USER.CONFIRMED_EMAIL И USER.EMAIL_STRING БЕЗ ПРЕДВАРИТЕЛЬНОГО ОЗНАКОМЛЕНИЯ КОДА И КОММЕНТАРИЕВ К НЕМУ
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
            'confirmed_email'=>$this->confirmed_email,
        ]);

        if($google){
            //для загрузки тестовых данных
            $email_string = Yii::$app->getSecurity()->generateRandomString();
            $user->setAttribute('email_string', $email_string);


            $user->setAttribute('confirmed_email', '1');
        }
        else {
            $email_string = Yii::$app->getSecurity()->generateRandomString();
            $user->setAttribute('email_string', $email_string);
            //$this->sendStringForEmailConfirm($email_string);
        }

        if ($referer) {
            $user->confirmed_email = 1;
            $user->email_string=null;
            $user->save();
            return $user->id;
        }

        //закоментирован код, при котором мы отправляли почту, если регистрация была не через гугл
        //при этом у пользователя атрибут confirmed_email выставлялся на 0. Сейчас на уровне БД прописано по default = 1
        //email_string все ещё нужен, для того, чтобы тестовые данные подгружались при первом входе нового пользователя.
        if ($user->save()) {
            //if($google) {
                $this->trigger(SiteController::EVENT_AFTER_LOGIN);
                return Yii::$app->user->login($user);
            //}
//            else
//                return Yii::$app->response->redirect('https://'.$_SERVER['HTTP_HOST'].'/core/default/confirm', 301)->send();
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
            ->setSubject('Спасибо за регистрацию')
            ->setHtmlBody('Вы зарегистрировались в приложении Форма. <a href="https://'.$_SERVER['HTTP_HOST'].'">Перейти к приложению</a>')
            ->send();

    }

    public function sendStringForEmailConfirm(string $email_string){
        //todo: нужно поменять адрес на настоящий сайт, посмотреть на сервер переменные $_SERVER[]
        Yii::$app->mailer->compose()
            ->setFrom('forma@gmail.com')
            ->setTo($this->email)
            ->setSubject('Forma: Подтверждение почты')
            ->setTextBody('Подтвердите пароль, перейдя по ссылке:')
            ->setHtmlBody('Подтвердите пароль, перейдя по ссылке: <a href="https://'.$_SERVER['HTTP_HOST'].'/core/default/confirm?email_string='.$email_string.'">Подтвердить почту</a>')
            ->send();
    }



}
