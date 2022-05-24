<?php

namespace forma\modules\transit\records\transitproduct;

use forma\components\AccessoryActiveRecord;
use forma\modules\core\components\NomenclatureUnitInterface;
use forma\modules\product\records\Product;
use forma\modules\product\records\PackUnit;
use forma\modules\transit\records\transit\Transit;
use forma\modules\warehouse\services\RemainsService;
use Yii;
use forma\modules\overheadcost\records\OverheadCost;

/**
 * This is the model class for table "transit_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $transit_id
 * @property integer $quantity
 * @property integer $pack_unit_id
 *  * @property string $purchase_cost
 * @property string $recommended_cost
 * @property string $consumer_cost
 * @property string $trade_cost
 * @property string $tax
 * @property string $overhead_cost
 * @property string $currency_id
 *
 * @property Product $product
 * @property Transit $transit
 * @property PackUnit $packUnit
 */
class TransitProduct extends AccessoryActiveRecord
implements NomenclatureUnitInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transit_product';
    }

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
    public function rules()
    {
        return [
            [['product_id', 'transit_id', 'quantity'], 'required'],
            [['product_id', 'transit_id', 'quantity', 'overhead_cost_id', 'pack_unit_id','currency_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['transit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transit::className(), 'targetAttribute' => ['transit_id' => 'id']],
            [['purchase_cost', 'recommended_cost','consumer_cost','trade_cost','tax','overhead_cost'], 'double'],
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
            $this->transit->from_warehouse_id
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
            'transit_id' => 'Транзит',
            'quantity' => 'Количество',
            'overhead_cost_id' => 'Накладной расход',
            'purchase_cost' => 'Ц.З.',
            'recommended_cost' => 'Р.Ц.',
            'consumer_cost' => 'Роз.Ц.',
            'trade_cost' => 'О.Ц.',
            'tax' => 'Налоги',
            'overhead_cost' => 'Накладной расход',
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
    public function getTransit()
    {
        return $this->hasOne(Transit::className(), ['id' => 'transit_id']);
    }

    /**
     * @inheritdoc
     * @return TransitProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransitProductQuery(get_called_class());
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

    public function getTransitName()
    {
        return $this->transit->name;
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
     * @return \yii\db\ActiveQuery
     */
    public function getPackUnit()
    {
        return $this->hasOne(PackUnit::className(), ['id' => 'pack_unit_id']);
    }
}
