<?php

namespace forma\modules\hr\records\volunteer;

use forma\components\AccessoryActiveRecord;
use Yii;

/**
 * This is the model class for table "volunteer".
 *
 * @property integer $id
 * @property integer $status
 * @property string $full_name
 * @property string $phone
 * @property integer $support_type
 * @property string $comment
 * @property integer $capacity
 * @property string $options
 * @property string $created_at
 */
class Volunteer extends AccessoryActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'volunteer';
    }

    public function getStatuses()
    {
        return [
            0 => 'Не актуально',
            1 => 'Актуально',
        ];
    }

    public function getSupportTypes()
    {
        return [
            0 => 'Жилье',
            1 => 'Транспорт',
            2 => 'Еда',
            3 => 'Одежда',
            4 => 'Др. вещи',
            5 => 'Финансы',
            6 => 'Услуга',
            7 => 'Физическая',
            8 => 'Другое',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->comment) {
            $this->comment = strip_tags($this->comment);
        }

        return parent::beforeSave($insert);
    }

    public function getOptions()
    {
        return [
            0 => 'отопление',
            1 => 'без отопления',
            2 => 'душ',
            3 => 'горячая вода',
            4 => 'холодная вода',
            5 => 'туалет в доме',
            6 => 'с кухней',
            7 => 'с кафе/столовой'
        ];
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
            [['comment'], 'string'],
            [['created_at'], 'safe'],
            [['status'], 'string', 'max' => 1],
            [['full_name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
            [['support_type'], 'string', 'max' => 8],
            [['capacity'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Статус',
            'full_name' => 'ФИО',
            'phone' => 'Номер телефона',
            'support_type' => 'Тип помощи',
            'comment' => 'Комментарий',
            'capacity' => 'Вместимость',
            'options' => 'Опции',
            'created_at' => 'Когда создано',
        ];
    }

    /**
     * @inheritdoc
     * @return VolunteerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VolunteerQuery(get_called_class());
    }
}
