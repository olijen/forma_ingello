<?php

namespace forma\modules\product\records;

use Yii;
use forma\components\EntityLister;
/**
* This is the model class for table "field_value".
*
  * @property integer $id
  * @property integer $field_id
  * @property string $name
  * @property integer $is_main
  *
      * @property Field $field
  */
class FieldValue extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'field_value';
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
            [['field_id', 'name'], 'required'],
            [['field_id'], 'integer'],
            [['name'], 'string', 'max' => 55],
            [['is_main'], 'string', 'max' => 1]
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'field_id' => 'Field ID',
        'name' => 'Значение',
        'is_main' => 'Значение по умолчанию',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getField()
  {
  return $this->hasOne(Field::className(), ['id' => 'field_id']);
  }
  
  /**
  * @inheritdoc
  * @return FieldValueQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new FieldValueQuery(get_called_class());
  }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }
}
