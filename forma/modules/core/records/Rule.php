<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "rule".
*
  * @property integer $id
  * @property string $action
  * @property string $table
  * @property integer $count_action
  * @property integer $item_id
  *
      * @property AccessInterface[] $accessInterfaces
      * @property Item $item
  */
class Rule extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'rule';
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
            [['count_action', 'item_id'], 'integer'],
            [['action', 'table'], 'string', 'max' => 255]
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'action' => 'Action',
        'table' => 'Table',
        'count_action' => 'Count action',
        'item_id' => 'Item ID',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getAccessInterfaces(): \yii\db\ActiveQuery
  {
  return $this->hasMany(AccessInterface::className(), ['rule_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getItemRules()
  {
  return $this->hasMany(ItemRule::className(), ['rule_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getItem()
  {
  return $this->hasOne(Item::className(), ['id' => 'item_id']);
  }
  
  /**
  * @inheritdoc
  * @return RuleQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new RuleQuery(get_called_class());
  }
}
