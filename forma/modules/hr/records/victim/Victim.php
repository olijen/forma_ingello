<?php

namespace forma\modules\hr\records\victim;

use yii\db\Query;

/**
 * This is the model class for table "victim".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $birthday
 * @property integer $is_child
 * @property string $place_of_residence
 * @property string $second_residence
 * @property string $name_where_to_settle
 * @property string $settlement_address
 * @property string $phone
 * @property string $registered_at
 * @property string $stay_for
 * @property string $questions
 * @property string $specialization
 * @property string $destination
 */
class Victim extends \forma\components\AccessoryActiveRecord
{


    public $how_many = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'victim';
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
            [['phone', 'stay_for', 'specialization', 'destination', 'how_many'], 'required'],
            [['fullname', 'place_of_residence', 'second_residence', 'name_where_to_settle', 'settlement_address', 'phone', 'stay_for', 'questions', 'specialization', 'destination'], 'string'],
            [['birthday', 'registered_at'], 'safe'],
            [['stay_for'], 'integer'],
            [['is_child'], 'integer', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'ФИО',
            'birthday' => 'Дата рожд',
            'is_child' => 'Ребёнок?',
            'place_of_residence' => 'Прописка',
            'second_residence' => 'Прописка 2',
            'name_where_to_settle' => 'Название размещения',
            'settlement_address' => 'Адрес размещения',
            'phone' => 'Телефон',
            'registered_at' => 'Дата регистр.',
            'stay_for' => 'Время пребывания',
            'questions' => 'Особенности',
            'specialization' => 'Специализация',
            'destination' => 'Куда уедет',
            'how_many' => 'Сколько людей?',
        ];
    }

    /**
     * @inheritdoc
     * @return VictimQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VictimQuery(get_called_class());
    }

    public static function getDateRange()
    {
        $range = (new Query())
            ->select(['MIN(date) AS min', 'MAX(date) AS max'])
            ->from(['inventorization'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public function beforeSave($insert)
    {
        $this->birthday = dateToDbFormat($this->birthday);
        $this->registered_at = dateToDbFormat($this->registered_at);

        return parent::beforeSave($insert);
    }
}
