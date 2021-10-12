<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "rule".
*
  * @property integer $id
  * @property string $action
  * @property string $model
  * @property integer $mark
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
            [['mark', 'item_id'], 'integer'],
            [['action', 'model'], 'string', 'max' => 255]
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
        'model' => 'Model',
        'mark' => 'Mark',
        'item_id' => 'Item ID',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getAccessInterfaces()
  {
  return $this->hasMany(AccessInterface::className(), ['rule_id' => 'id']);
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
