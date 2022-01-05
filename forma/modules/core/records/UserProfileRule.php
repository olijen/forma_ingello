<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "user_profile_rule".
*
  * @property integer $id
  * @property integer $rule_id
  * @property integer $user_profile_id
  * @property string $date
  *
      * @property Rule $rule
      * @property UserProfile $userProfile
  */
class UserProfileRule extends \yii\db\ActiveRecord
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
            [['rule_id', 'user_profile_id'], 'integer'],
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
        'user_profile_id' => 'User Profile ID',
        'date' => 'Date',
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
  public function getUserProfile()
  {
  return $this->hasOne(UserProfile::className(), ['id' => 'user_profile_id']);
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
