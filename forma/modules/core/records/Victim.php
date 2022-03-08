<?php

namespace forma\modules\core\records;

use Yii;

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
            [['fullname', 'place_of_residence', 'second_residence', 'name_where_to_settle', 'settlement_address', 'phone', 'stay_for', 'questions', 'specialization', 'destination'], 'string'],
            [['birthday', 'registered_at'], 'safe'],
            [['is_child'], 'string', 'max' => 1]
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => Yii::t('app', 'ID'),
        'fullname' => Yii::t('app', 'Fullname'),
        'birthday' => Yii::t('app', 'Birthday'),
        'is_child' => Yii::t('app', 'Is Child'),
        'place_of_residence' => Yii::t('app', 'Place Of Residence'),
        'second_residence' => Yii::t('app', 'Second Residence'),
        'name_where_to_settle' => Yii::t('app', 'Name Where To Settle'),
        'settlement_address' => Yii::t('app', 'Settlement Address'),
        'phone' => Yii::t('app', 'Phone'),
        'registered_at' => Yii::t('app', 'Registered At'),
        'stay_for' => Yii::t('app', 'Stay For'),
        'questions' => Yii::t('app', 'Questions'),
        'specialization' => Yii::t('app', 'Specialization'),
        'destination' => Yii::t('app', 'Destination'),
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
}
