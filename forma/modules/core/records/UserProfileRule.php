<?php

namespace forma\modules\core\records;

use forma\components\AccessoryActiveRecord;
use Yii;

/**
* This is the model class for table "user_profile_rule".
*
  * @property integer $id
  * @property integer $rule_id
  * @property string $date
  * @property integer $user_id
  *
      * @property Rule $rule
      * @property User $user
  */
class UserProfileRule extends AccessoryActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'user_profile_rule';
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
            [['rule_id','user_id'], 'integer'],
            [['date'], 'safe']
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'rule_id' => 'Rule ID',
        'date' => 'Date',
        'user_id' => 'User ID',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRule()
  {
  return $this->hasOne(Rule::className(), ['id' => 'rule_id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUser()
  {
  return $this->hasOne(User::className(), ['id' => 'user_id']);
  }
  
  /**
  * @inheritdoc
  * @return UserProfileRuleQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new UserProfileRuleQuery(get_called_class());
  }
}
