<?php

namespace forma\modules\hr\models;

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
class Victim extends \yii\db\ActiveRecord
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
            [['fullname', 'place_of_residence', 'second_residence', 'name_where_to_settle', 'settlement_address', 'phone', 'stay_for', 'questions', 'specialization', 'destination'], 'string'],
            [['birthday', 'registered_at'], 'safe'],
            [['is_child'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'birthday' => 'Birthday',
            'is_child' => 'Is Child',
            'place_of_residence' => 'Place Of Residence',
            'second_residence' => 'Second Residence',
            'name_where_to_settle' => 'Name Where To Settle',
            'settlement_address' => 'Settlement Address',
            'phone' => 'Phone',
            'registered_at' => 'Registered At',
            'stay_for' => 'Stay For',
            'questions' => 'Questions',
            'specialization' => 'Specialization',
            'destination' => 'Destination',
        ];
    }
}
