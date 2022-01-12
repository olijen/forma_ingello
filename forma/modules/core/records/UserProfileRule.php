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
  * @property integer $user_id
  *
      * @property Rule $rule
      * @property UserProfile $userProfile
      * @property User $user
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
            [['rule_id', 'user_profile_id', 'user_id'], 'integer'],
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
  public function getUserProfile()
  {
  return $this->hasOne(UserProfile::className(), ['id' => 'user_profile_id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUser()
  {
  return $this->hasOne(User::className(), ['id' => 'user_id']);
  }
}
