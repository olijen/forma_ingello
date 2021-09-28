<?php

namespace forma\modules\event\records;

use forma\components\AccessoryActiveRecord;
use forma\modules\selling\records\selling\Selling;

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
 * @property int $selling_id
 *
 * @property EventType $eventType
 * @property  Selling $selling
 */
class Event extends AccessoryActiveRecord
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
            [['name', 'date_from', 'date_to', 'start_time','end_time'], 'required'],
            [['event_type_id', 'status','selling_id'], 'integer'],
            [['text'], 'string'],
            [['start_time', 'end_time'],'safe'],
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
            'name' => 'Название',
            'text' => 'Текст',
            'status' => 'Статус',
            'date_from' => 'Дата начала',
            'date_to' => 'Дата завершения',
            'start_time' => 'Время',
            'end_time' => 'Время',
            'selling_id' =>'Код продажи',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type_id']);
    }
    public function getSelling()
    {
        return $this->hasOne(Selling::className(), ['id' => 'selling_id']);
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
    public  function  beforeSave($insert)
    {
        $dates = explode(".",$this->date_from);
        if (!empty($dates[2])) {
            $this->date_from =$dates[2].'-'.$dates[1].'-'.$dates[0];
        }
        $dates = explode(".",$this->date_to);
        if (!empty($dates[2])) {
            $this->date_to =$dates[2].'-'.$dates[1].'-'.$dates[0];
        }
        return parent::beforeSave($insert);
    }
}
