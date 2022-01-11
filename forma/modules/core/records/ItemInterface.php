<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "item_interface".
*
  * @property integer $id
  * @property integer $rank_id
  * @property string $module
  * @property string $key
  *
      * @property Rank $rank
      * @property ItemRule[] $itemRules
  */
class ItemInterface extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'item_interface';
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
            [['rank_id'], 'integer'],
            [['module', 'key'], 'string']
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'rank_id' => 'Rank ID',
        'module' => 'Module',
        'key' => 'Key',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRank()
  {
  return $this->hasOne(Rank::className(), ['id' => 'rank_id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getItemRules()
  {
  return $this->hasMany(ItemRule::className(), ['item_interface_id' => 'id']);
  }
  
  /**
  * @inheritdoc
  * @return ItemInterfaceQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new ItemInterfaceQuery(get_called_class());
  }
}
