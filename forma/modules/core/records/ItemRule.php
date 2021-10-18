<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "item_rule".
*
  * @property integer $id
  * @property integer $rule_id
  * @property integer $item_interface_id
  *
      * @property ItemInterface $itemInterface
      * @property Rule $rule
  */
class ItemRule extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'item_rule';
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
            [['rule_id', 'item_interface_id'], 'integer']
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
        'item_interface_id' => 'Item Interface ID',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getItemInterface()
  {
  return $this->hasOne(ItemInterface::className(), ['id' => 'item_interface_id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRule()
  {
  return $this->hasOne(Rule::className(), ['id' => 'rule_id']);
  }
  
  /**
  * @inheritdoc
  * @return ItemRuleQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new ItemRuleQuery(get_called_class());
  }
}
