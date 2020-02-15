<?php

namespace forma\modules\selling\records\sellingproduct;

/**
 * This is the ActiveQuery class for [[SellingProduct]].
 *
 * @see SellingProduct
 */
class SellingProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SellingProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SellingProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
