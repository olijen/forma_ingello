<?php

namespace forma\modules\purchase\records\purchase;

use Yii;
use forma\modules\overheadcost\records\OverheadCost;

/**
 * This is the model class for table "purchase_overhead_cost".
 *
 * @property integer $id
 * @property integer $purchase_id
 * @property integer $overhead_cost_id
 *
 * @property OverheadCost $overheadCost
 * @property Purchase $purchase
 */
class PurchaseOverheadCost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_overhead_cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchase_id', 'overhead_cost_id'], 'required'],
            [['purchase_id', 'overhead_cost_id'], 'integer'],
            [['overhead_cost_id'], 'exist', 'skipOnError' => true, 'targetClass' => OverheadCost::className(), 'targetAttribute' => ['overhead_cost_id' => 'id']],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Purchase::className(), 'targetAttribute' => ['purchase_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purchase_id' => 'Purchase ID',
            'overhead_cost_id' => 'Overhead Cost ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOverheadCost()
    {
        return $this->hasOne(OverheadCost::className(), ['id' => 'overhead_cost_id']);
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
     * @return PurchaseOverheadCostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PurchaseOverheadCostQuery(get_called_class());
    }
}
