<?php

namespace forma\modules\transit\records\transitproduct;

/**
 * This is the ActiveQuery class for [[TransitProduct]].
 *
 * @see TransitProduct
 */
class TransitProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransitProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransitProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
