<?php

namespace forma\modules\inventorization\records;

/**
 * This is the ActiveQuery class for [[InventorizationProduct]].
 *
 * @see InventorizationProduct
 */
class InventorizationProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InventorizationProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InventorizationProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
