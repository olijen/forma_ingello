<?php

namespace forma\modules\hr\records\victim;

use forma\components\AccessoryActiveRecord;
use Yii;

/**
 * This is the model class for table "victim".
 *
 * @property int $id
 * @property string|null $fullname
 * @property string|null $birthday
 * @property int|null $is_child
 * @property string|null $place_of_residence
 * @property string|null $second_residence
 * @property string|null $name_where_to_settle
 * @property string|null $settlement_address
 * @property string|null $phone
 * @property string|null $registered_at
 * @property string|null $stay_for
 * @property string|null $questions
 * @property string|null $specialization
 * @property string|null $destination
 */
class Victim extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'victim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'birthday', 'registered_at'], 'required'],
            [['fullname', 'place_of_residence', 'second_residence', 'name_where_to_settle', 'settlement_address', 'phone', 'stay_for', 'questions', 'specialization', 'destination'], 'string'],
            [['birthday', 'registered_at'], 'safe'],
            [['is_child'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => Yii::t('app', 'ФИО'),
            'birthday' => Yii::t('app', 'Дата рождения'),
            'is_child' => Yii::t('app', 'Ребенок ли?'),
            'place_of_residence' => Yii::t('app', 'Адрес прописки'),
            'second_residence' => Yii::t('app', 'Вторая прописка'),
            'name_where_to_settle' => Yii::t('app', 'Где поселят'),
            'settlement_address' => Yii::t('app', 'Settlement Address'),
            'phone' => Yii::t('app', 'Телефон'),
            'registered_at' => Yii::t('app', 'Дата Реєстрації'),
            'stay_for' => Yii::t('app', 'Час перебування - текст (не время)'),
            'questions' => Yii::t('app', 'Порушені питання'),
            'specialization' => Yii::t('app', 'Специализация'),
            'destination' => Yii::t('app', 'Куди хоче потрапити'),
        ];
    }
}
