<?php

namespace forma\modules\inventorization\records;

use forma\modules\product\records\Product;
use Yii;

/**
 * This is the model class for table "inventorization_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $inventorization_id
 * @property integer $accounting_quantity
 * @property integer $fact_quantity
 *
 * @property Inventorization $inventorization
 * @property Product $product
 */
class InventorizationProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventorization_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'inventorization_id'], 'required'],
            [['product_id', 'inventorization_id', 'accounting_quantity', 'fact_quantity'], 'integer'],
            [['inventorization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventorization::className(), 'targetAttribute' => ['inventorization_id' => 'id']],
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
            'product_id' => 'Товар',
            'inventorization_id' => 'Инвентаризация',
            'accounting_quantity' => 'Учетное количество',
            'fact_quantity' => 'Фактическое количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventorization()
    {
        return $this->hasOne(Inventorization::className(), ['id' => 'inventorization_id']);
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
     * @return InventorizationProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InventorizationProductQuery(get_called_class());
    }

    public function getProductCategoryName()
    {
        return $this->product->category->name;
    }

    public function getProductManufacturerName()
    {
        return $this->product->manufacturer->name;
    }

    public function getProductName()
    {
        return $this->product->name;
    }

    public function getInventorizationName()
    {
        return $this->inventorization->name;
    }
}
