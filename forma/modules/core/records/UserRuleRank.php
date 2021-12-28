<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "user_rule_rank".
*
  * @property integer $id
  * @property integer $id_user_profile
  * @property integer $rule_rank_id
  * @property string $date
  *
      * @property RankRule $ruleRank
  */
class UserRuleRank extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'user_rule_rank';
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
            [['id_user_profile', 'rule_rank_id'], 'integer'],
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
        'id_user_profile' => 'Id User Profile',
        'rule_rank_id' => 'Rule Rank ID',
        'date' => 'Date',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRuleRank()
  {
  return $this->hasOne(RankRule::className(), ['id' => 'rule_rank_id']);
  }
  
  /**
  * @inheritdoc
  * @return UserRankRuleQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new UserRankRuleQuery(get_called_class());
  }
}
