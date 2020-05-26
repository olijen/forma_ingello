<?php

namespace forma\modules\product\records;

use Yii;

/**
 * This is the model class for table "field_product_value".
 *
 * @property integer $id
 * @property integer $field_id
 * @property integer $product_id
 * @property string $value
 *
 * @property Field $field
 * @property Product $product
 */
class FieldProductValue extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_product_value';
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
            [['field_id', 'product_id'], 'required'],
            [['field_id', 'product_id'], 'integer'],
            [['value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_id' => 'Виджет(id)',
            'product_id' => 'Продукт(id)',
            'value' => 'Значение в продуктах',
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
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @inheritdoc
     * @return FieldProductValueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FieldProductValueQuery(get_called_class());
    }

}
