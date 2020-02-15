<?php

namespace forma\modules\event\records;

use Yii;

/**
 * This is the model class for table "event_type".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $status
 * @property string $color
 *
 * @property Event[] $events
 */
class EventType extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_type';
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
            [['name'], 'required'],
            [['name', 'status'], 'integer'],
            [['color'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'name' => 'Имя',
            'status' => 'Статус',
            'color' => 'Цвет',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['event_type_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return EventTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventTypeQuery(get_called_class());
    }

    public function getStatusList()
    {
        return [
            0 => 'Удалено',
            1 => 'Активно'
        ];
    }
}
