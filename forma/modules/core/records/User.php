<?php

namespace forma\modules\core\records;

use forma\modules\warehouse\records\WarehouseUser;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $auth_key
 * @property string $access_token
 * @property integer $parent_id
 *
 * @property WarehouseUser[] $warehouseUsers
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['username', 'email', 'phone'], 'string', 'max' => 100],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['parent_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'email' => 'Эл. почта',
            'phone' => 'Моб. номер',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'parent_id' => 'Реферал',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouseUsers()
    {
        return $this->hasMany(WarehouseUser::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @return mixed
     */
    public static function getAdmin()
    {
        $admin = self::find()->where(['username' => 'admin'])->one();

        return $admin['id'];
    }

    public function getParent()
    {
       return self::find()->where(['id' => $this->parent_id])->all();
    }
}
