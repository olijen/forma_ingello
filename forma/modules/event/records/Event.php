<?php

namespace forma\modules\event\records;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property integer $event_type_id
 * @property string $name
 * @property string $text
 * @property integer $status
 * @property string $date_from
 * @property string $date_to
 * @property string $start_time
 * @property string $end_time
 *
 * @property EventType $eventType
 */
class Event extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
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
            [['name', 'text', 'date_from', 'date_to', 'start_time','end_time'], 'required'],
            [['event_type_id', 'status'], 'integer'],
            [['text'], 'string'],
            [['date_from', 'date_to', 'start_time','end_time','event_type_id','status'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'event_type_id' => 'Тип',
            'name' => 'Имя',
            'text' => 'Текст',
            'status' => 'Статус',
            'date_from' => 'Дата начала',
            'date_to' => 'Дата завешения',
            'start_time' => 'Время',
            'end_time' => 'Время',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type_id']);
    }

    /**
     * @inheritdoc
     * @return EventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventQuery(get_called_class());
    }

    public static function getList()
    {
        $list = [];
        foreach (self::find()->all() as $rate) {
            $list[$rate->id] = "{$rate->name} ({$rate->percent}%)";
        }
        return $list;
    }

    public function getStatusList()
    {
        return [
            0 => 'Удалено',
            1 => 'Активно'
        ];
    }

    public function getStatusName()
    {
        return $this->getStatusList()[$this->status];
    }
}
