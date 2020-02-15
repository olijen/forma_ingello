<?php

namespace forma\modules\overheadcost\records;

use forma\modules\product\records\Currency;
use forma\modules\purchase\records\purchase\PurchaseOverheadCost;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use forma\modules\transit\records\transit\TransitOverheadCost;
use forma\modules\transit\records\transitproduct\TransitProduct;
use Yii;

/**
 * This is the model class for table "overhead_cost".
 *
 * @property integer $id
 * @property integer $type
 * @property double $sum
 * @property string $comment
 *
 * @property integer $currency_id
 *
 * @property PurchaseProduct[] $purchaseProducts
 * @property SellingProduct[] $sellingProducts
 * @property TransitProduct[] $transitProducts
 *
 * @property Currency[] $currency
 */
class OverheadCost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'overhead_cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_id'], 'required'],
            [['type', 'sum', 'comment'], 'isEmpty'],
            [['type', 'currency_id'], 'integer'],
            [['sum'], 'number'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    public function isEmpty($attribute, $params, $validator)
    {
        if (empty($this->type) && empty($this->sum) && empty($this->comment)) {
            $this->addError('comment', 'Вы не можете создать пустой накладной расход');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'sum' => 'Sum',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::className(), ['overhead_cost_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSellingProducts()
    {
        return $this->hasMany(SellingProduct::className(), ['overhead_cost_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitProducts()
    {
        return $this->hasMany(TransitProduct::className(), ['overhead_cost_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return OverheadCostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OverheadCostQuery(get_called_class());
    }

    public static function getTypes()
    {
        return [
            1 => 'Складские',
            2 => 'Таможенные',
            3 => 'Транзитные',
            4 => 'Другие',
        ];
    }

    public function getTypeTitle()
    {
        if (!key_exists($this->type, static::getTypes())) {
            return false;
        }

        if (!$this->type) {
            return null;
        }

        return static::getTypes()[$this->type];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitOverheadCost()
    {
        return $this->hasOne(TransitOverheadCost::className(), ['overhead_cost_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOverheadCost()
    {
        return $this->hasOne(PurchaseOverheadCost::className(), ['overhead_cost_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
