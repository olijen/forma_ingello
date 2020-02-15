<?php

namespace forma\modules\product\records;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_pack_unit".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $pack_unit_id
 *
 * @property PackUnit $packUnit
 * @property Product $product
 */
class ProductPackUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_pack_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'pack_unit_id'], 'integer'],
            [['pack_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => PackUnit::className(), 'targetAttribute' => ['pack_unit_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'pack_unit_id' => 'Pack Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackUnit()
    {
        return $this->hasOne(PackUnit::className(), ['id' => 'pack_unit_id']);
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
     * @return ProductPackUnitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductPackUnitQuery(get_called_class());
    }
}
