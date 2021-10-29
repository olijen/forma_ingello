<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "item_interface".
*
  * @property integer $id
  * @property string $name_item
  * @property integer $id_item
  *
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
            [['id_item'], 'integer'],
            [['name_item'], 'string', 'max' => 255]
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'name_item' => 'Name Item',
        'id_item' => 'Id Item',
    ];
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
