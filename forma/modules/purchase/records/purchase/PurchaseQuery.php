<?php

namespace forma\modules\purchase\records\purchase;

/**
 * This is the ActiveQuery class for [[Purchase]].
 *
 * @see Purchase
 */
class PurchaseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Purchase[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Purchase|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
