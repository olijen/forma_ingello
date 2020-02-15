<?php

namespace forma\modules\purchase\records\purchaseproduct;

use forma\modules\product\records\Currency;
use Yii;
use forma\modules\core\components\NomenclatureUnitInterface;
use forma\modules\product\records\TaxRate;
use forma\modules\product\records\Product;
use forma\modules\purchase\records\purchase\Purchase;
use yii\db\ActiveRecord;
use forma\modules\product\records\PackUnit;
use forma\modules\overheadcost\records\OverheadCost;

/**
 * This is the model class for table "purchase_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $purchase_id
 * @property integer $quantity
 * @property float $prepayment
 * @property float $cost
 *
 * @property integer $pack_unit_id
 * @property integer $currency_id
 *
 * @property Product $product
 * @property Purchase $purchase
 *
 * @property PackUnit $packUnit
 * @property Currency $currency
 * @property OverheadCost $overheadCost
 */
class PurchaseProduct extends ActiveRecord
implements NomenclatureUnitInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'purchase_id', 'quantity', 'cost', 'currency_id'], 'required'],
            [['product_id', 'purchase_id', 'quantity', 'overhead_cost_id', 'tax_rate_id', 'currency_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Purchase::className(), 'targetAttribute' => ['purchase_id' => 'id']],
            [['cost', 'prepayment'], 'number'],
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
            'purchase_id' => 'Закупка',
            'quantity' => 'Количество',
            'cost' => 'Стоимость',
            'tax_rate_id' => 'Налоговая ставка',
            'overhead_cost_id' => 'Накладной расход',
            'prepayment' => 'Предоплата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(Purchase::className(), ['id' => 'purchase_id']);
    }

    /**
     * @inheritdoc
     * @return PurchaseProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PurchaseProductQuery(get_called_class());
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

    public function getPurchaseName()
    {
        return $this->purchase->name;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getCurrencyLabel()
    {
        if ($this->product->type_id === Product::WINE_TYPE_ID) {
            return '€';
        }
        if ($this->product->type_id === Product::BOOZE_TYPE_ID) {
            return '$';
        }
        return '';
    }

    public function getCostLabel()
    {
        if (!$this->cost) {
            return null;
        }
        return $this->getCurrencyLabel() . $this->cost;
    }

    /**
     * @inheritdoc
     */
    public function getOverheadCost()
    {
        return $this->hasOne(OverheadCost::className(), ['id' => 'overhead_cost_id']);
    }

    public function getPackUnitId()
    {
        return $this->product ? $this->product->pack_unit_id : null;
    }

    public function getTaxRate()
    {
        return $this->hasOne(TaxRate::className(), ['id' => 'tax_rate_id']);
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
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
