<?php

namespace forma\modules\purchase\records\purchaseproduct;

/**
 * This is the ActiveQuery class for [[PurchaseProduct]].
 *
 * @see PurchaseProduct
 */
class PurchaseProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PurchaseProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PurchaseProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
