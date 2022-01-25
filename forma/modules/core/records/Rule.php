<?php

namespace forma\modules\core\records;

use forma\components\AccessoryActiveRecord;
use Yii;
use forma\modules\core\records\ItemRule;
use forma\modules\core\records\Item;

/**
* This is the model class for table "rule".
*
  * @property integer $id
  * @property string $action
  * @property string $table
  * @property string $rule_name
  * @property integer $count_action
  * @property integer $item_id
  *
      * @property AccessInterface[] $accessInterfaces
      * @property Item $item
      * @property ItemRule $itemRules
  */
class Rule extends AccessoryActiveRecord
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
            [['action', 'table','rule_name'], 'string', 'max' => 255],

        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'action' => 'Событие',
        'table' => 'Таблица',
        'count_action' => 'Количество действий',
        'rule_name'=>'Описание правила',
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
  public function getItemRule(): \yii\db\ActiveQuery
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
