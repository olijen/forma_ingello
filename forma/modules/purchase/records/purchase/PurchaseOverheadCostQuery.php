<?php

namespace forma\modules\purchase\records\purchase;

/**
 * This is the ActiveQuery class for [[PurchaseOverheadCost]].
 *
 * @see PurchaseOverheadCost
 */
class PurchaseOverheadCostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PurchaseOverheadCost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PurchaseOverheadCost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
