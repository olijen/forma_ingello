<?php

namespace forma\modules\warehouse\records;

use forma\modules\product\records\Currency;
use forma\modules\product\records\Product;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use Yii;
use yii\db\ActiveRecord;
use forma\modules\transit\records\transitproduct\TransitProduct;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "warehouse_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $warehouse_id
 * @property integer $quantity
 * @property integer $currency_id
 *
 * @property Product $product
 * @property Warehouse $warehouse
 * @property int purchase_cost
 * @property int consumer_cost
 * @property int recommended_cost
 * @property int overhead_cost
 *
 * @property Currency $currency
 */
class WarehouseProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'warehouse_id', 'quantity', 'currency_id'], 'required'],
            [['product_id', 'warehouse_id', 'quantity', 'currency_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
            [['purchase_cost', 'consumer_cost', 'recommended_cost', 'trade_cost', 'tax', 'overhead_cost'], 'number'],
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
            'warehouse_id' => 'Склад',
            'quantity' => 'Количество',

            'purchase_cost' => 'Цена закупки',
            'consumer_cost' => 'Розничная цена',
            'recommended_cost' => 'Рекомендованная цена',
            'trade_cost' => 'Оптовая цена',

            'tax' => 'Налог',
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
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }

    /**
     * @inheritdoc
     * @return WarehouseProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WarehouseProductQuery(get_called_class());
    }

    public function getProductName()
    {
        return $this->product->name;
    }

    public function getWarehouseName()
    {
        return $this->warehouse->name;
    }

    public function getCurrencyLabel()
    {
        if ($this->product->type_id === Product::WINE_TYPE_ID) {
            return '€';
        } elseif ($this->product->type_id === Product::BOOZE_TYPE_ID) {
            return '$';
        }
    }

    public function getPurchaseCostLabel()
    {
        return $this->purchase_cost ? $this->getCurrencyLabel() . $this->purchase_cost : null;
    }

    public function getConsumerCostLabel()
    {
        return $this->consumer_cost ? $this->getCurrencyLabel() . $this->consumer_cost : null;
    }

    public function getRecommendedCostLabel()
    {
        return $this->recommended_cost ? $this->getCurrencyLabel() . $this->recommended_cost : null;
    }

    public function getTradeCostLabel()
    {
        return $this->trade_cost ? $this->getCurrencyLabel() . $this->trade_cost : null;
    }

    public function getIndirectPurchaseCostLabel()
    {
        return $this->getCurrencyLabel() .
            ($this->purchase_cost + $this->tax + $this->overhead_cost);
    }

    public function getReservedFromSelling()
    {
        $sellingProducts = SellingProduct::find()
            ->joinWith(['selling'], true, 'INNER JOIN')
            ->select(['selling_product.quantity'])
            ->where(['selling.warehouse_id' => $this->warehouse_id])
            ->andWhere(['selling_product.product_id' => $this->product_id])
            //->andWhere(['=', 'selling.state', 0])
            ->all();

        $inSelling = 0;
        foreach ($sellingProducts as $sellingProduct) {
            $inSelling += $sellingProduct->quantity;
        }

        return $inSelling;
    }

    public function getReservedFromTransit()
    {
        $transitProducts = TransitProduct::find()
            ->joinWith(['transit'], true, 'INNER JOIN')
            ->select(['transit_product.quantity'])
            ->where(['transit.from_warehouse_id' => $this->warehouse_id])
            ->andWhere(['transit_product.product_id' => $this->product_id])
            ->andWhere(['=', 'transit.state', 0])
            ->all();

        $inTransit = 0;
        foreach ($transitProducts as $transitProduct) {
            $inTransit += $transitProduct->quantity;
        }

        return $inTransit;
    }

    public function getReserved()
    {
        return $this->getReservedFromSelling() + $this->getReservedFromTransit();
    }

    protected function getExpectedFromPurchase()
    {
        $paymentState = 1;
        $purchaseProducts = PurchaseProduct::find()
            ->joinWith(['purchase'], true, 'INNER JOIN')
            ->select(['purchase_product.quantity'])
            ->where(['purchase.warehouse_id' => $this->warehouse_id])
            ->andWhere(['purchase_product.product_id' => $this->product_id])
            ->andWhere(['=', 'purchase.state', $paymentState])
            ->all();

        $inPurchase = 0;
        foreach ($purchaseProducts as $purchaseProduct) {
            $inPurchase += $purchaseProduct->quantity;
        }

        return $inPurchase;
    }

    protected function getExpectedFromTransit()
    {
        $transitProducts = TransitProduct::find()
            ->joinWith(['transit'], true, 'INNER JOIN')
            ->select(['transit_product.quantity'])
            ->where(['transit.to_warehouse_id' => $this->warehouse_id])
            ->andWhere(['transit_product.product_id' => $this->product_id])
            ->andWhere(['=', 'transit.state', 0])
            ->all();

        $inTransit = 0;
        foreach ($transitProducts as $transitProduct) {
            $inTransit += $transitProduct->quantity;
        }

        return $inTransit;
    }

    public function getExpected()
    {
        return $this->getExpectedFromPurchase() + $this->getExpectedFromTransit();
    }

    public static function getAvailableForAddingList($warehouseId)
    {
        $query = "
            SELECT product.name, product.id
            FROM product LEFT JOIN
              (SELECT * FROM warehouse_product WHERE warehouse_id = :warehouseId)
            this_warehouse_product
            ON product.id = this_warehouse_product.product_id
            WHERE this_warehouse_product.id IS NULL;
        ";

        $result = Yii::$app->db->createCommand($query)
            ->bindValue(':warehouseId', $warehouseId)
            ->queryAll();

        return ArrayHelper::map($result, 'id', 'name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    public function beforeValidate()
    {
        if (!$this->currency_id) {
            $this->currency_id = 1;
        }

        return parent::beforeValidate();
    }
}
