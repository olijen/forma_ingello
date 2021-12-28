<?php

namespace forma\modules\selling\records\state;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\core\records\User;
use Yii;

/**
 * This is the model class for table "state".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $description
 *
 * @property User $user
 */
class State extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'order'], 'required'],
            [['user_id', 'order'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 65000],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Состояния'),
            'user_id' => Yii::t('app', 'User ID'),
            'order'=> Yii::t('app', 'Порядок'),
            'description'=> Yii::t('app', 'Описание'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getToState()
    {
        return $this->hasMany(StateToState::className(), ['to_state_id' => 'id']);
    }

    public function getState()
    {
        return $this->hasMany(StateToState::className(), ['state_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return StateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StateQuery(get_called_class());
    }

    public static function getList($byUser = null)
    {
        return EntityLister::getList(self::className(), $byUser);
    }
}
