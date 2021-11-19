<?php

namespace forma\modules\selling\records\sellingproduct;

use Yii;
use forma\modules\product\records\Currency;
use forma\modules\product\records\Product;
use forma\modules\product\records\PackUnit;
use forma\modules\selling\records\selling\Selling;
use forma\modules\warehouse\services\RemainsService;
use yii\db\ActiveRecord;
use forma\modules\core\components\NomenclatureUnitInterface;
use forma\modules\overheadcost\records\OverheadCost;

/**
 * This is the model class for table "selling_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $selling_id
 * @property integer $quantity
 * @property integer $currency_id
 * @property string $currency_name
 * @property integer $pack_unit_id
 * @property integer $overhead_cost_id
 *
 * @property Product $product
 * @property Selling $selling
 * @property PackUnit $packUnit
 * @property Currency $currency
 * @property OverheadCost $overheadCost
 */
class SellingProduct extends ActiveRecord
    implements NomenclatureUnitInterface
{
    /**
     * @inheritdoc
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @inheritdoc
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'selling_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'selling_id', 'quantity', 'currency_id'], 'required'],
            [['product_id', 'selling_id', 'quantity', 'overhead_cost_id', 'cost_type'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['selling_id'], 'exist', 'skipOnError' => true, 'targetClass' => Selling::className(), 'targetAttribute' => ['selling_id' => 'id']],
            [['cost'], 'number'],
            [['quantity'], 'validateAvailability'],
        ];
    }

    public function validateAvailability($attribute, $params, $validator)
    {
        if (!$this->product_id) {
            return false;
        }

        /** @var integer $availableProductQty */
        $availableProductQty = RemainsService::getAvailable(
            $this->product_id,
            $this->selling->getRelatedWarehouse()->id
        );

        if (!$this->isNewRecord) {
            $availableProductQty += static::findOne($this->id)->quantity;
        }

        if ($this->quantity > $availableProductQty) {
            $this->addError('quantity', "Доступное количество товара - $availableProductQty");
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Товар',
            'selling_id' => 'Продажа',
            'quantity' => 'Количество',
            'cost' => 'Стоимость',
            'overhead_cost_id' => 'Накладной расход',
            'cost_type' => 'Тип стоимости',
            'currency_id' => 'Валюта',
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
    public function getSelling()
    {
        return $this->hasOne(Selling::className(), ['id' => 'selling_id']);
    }

    /**
     * @inheritdoc
     * @return SellingProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SellingProductQuery(get_called_class());
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

    public function getSellingName()
    {
        return $this->selling->name;
    }

    public function getCurrencyLabel()
    {
        if ($this->product->type_id === Product::WINE_TYPE_ID) {
            return '€';
        } elseif ($this->product->type_id === Product::BOOZE_TYPE_ID) {
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

    public static function getCostTypes()
    {
        return [
            0 => 'Розница',
            1 => 'Опт',
        ];
    }


    public function getCostTypeLabel()
    {
        if (is_null($this->cost_type)) {
            return null;
        }

        return static::getCostTypes()[$this->cost_type];
    }

    public function getPackUnitId()
    {
        return $this->product ? $this->product->pack_unit_id : null;
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
