<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "rule_rank".
*
  * @property integer $id
  * @property integer $rule_id
  * @property integer $rank_id
  *
      * @property UserRuleRank[] $userRuleRanks
  */
class RuleRank extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'rule_rank';
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
            [['rule_id', 'rank_id'], 'integer']
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
        'rank_id' => 'Rank ID',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUserRuleRanks()
  {
  return $this->hasMany(UserRuleRank::className(), ['rule_rank_id' => 'id']);
  }
  
  /**
  * @inheritdoc
  * @return RankQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new RankQuery(get_called_class());
  }
}
