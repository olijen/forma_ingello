<?php

namespace forma\modules\message\records;

use forma\components\AccessoryActiveRecord;
use forma\modules\core\records\User;
use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property integer $from_user_id
 * @property integer $to_user_id
 * @property string $title
 * @property string $text
 * @property string $datetime
 * @property integer $favorit
 * @property integer $status
 *
 * @property User $fromUser
 * @property User $toUser
 */
class Message extends AccessoryActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_user_id', 'to_user_id', 'title', 'text', 'datetime', 'favorit', 'status'], 'required'],
            [['from_user_id', 'to_user_id', 'favorit', 'status'], 'integer'],
            [['text'], 'string'],
            [['datetime'], 'safe'],
            [['title'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'from_user_id' => 'Кто',
            'to_user_id' => 'Кому',
            'title' => 'О чем',
            'text' => 'Сообщение',
            'datetime' => 'Когда',
            'favorit' => 'Избранное',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromUser()
    {
        return $this->hasOne(User::className(), ['id' => 'from_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToUser()
    {
        return $this->hasOne(User::className(), ['id' => 'to_user_id']);
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }

    public function getStatusList()
    {
        return [
            0 => 'Удалено',
            1 => 'Активно'
        ];
    }
}
