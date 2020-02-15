<?php

namespace forma\modules\transit\records\transit;

use Yii;
use forma\modules\overheadcost\records\OverheadCost;

/**
 * This is the model class for table "transit_overhead_cost".
 *
 * @property integer $id
 * @property integer $transit_id
 * @property integer $overhead_cost_id
 *
 * @property OverheadCost $overheadCost
 * @property Transit $transit
 */
class TransitOverheadCost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transit_overhead_cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transit_id', 'overhead_cost_id'], 'required'],
            [['transit_id', 'overhead_cost_id'], 'integer'],
            [['overhead_cost_id'], 'exist', 'skipOnError' => true, 'targetClass' => OverheadCost::className(), 'targetAttribute' => ['overhead_cost_id' => 'id']],
            [['transit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transit::className(), 'targetAttribute' => ['transit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transit_id' => 'Transit ID',
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
    public function getTransit()
    {
        return $this->hasOne(Transit::className(), ['id' => 'transit_id']);
    }

    /**
     * @inheritdoc
     * @return TransitOverheadCostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransitOverheadCostQuery(get_called_class());
    }
}
