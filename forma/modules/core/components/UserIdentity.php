<?php

namespace forma\modules\core\components;

use yii\web\IdentityInterface;
use forma\modules\core\records\User;
use Yii;

/**
 * UserIdentity Model
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 * @property integer $parent_id
 * @property integer $confirmed_email
 * @property string $email_string
 */
class UserIdentity extends User implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    public static function findByEmailString($email_string){
        return self::findOne(['email_string' => $email_string]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    // Для модуля user от dektrium
    /*
    public function getIsAdmin()
    {
        return $this->id == 1;
    }
    */
}
