<?php

namespace forma\modules\inventorization\records;

/**
 * This is the ActiveQuery class for [[Inventorization]].
 *
 * @see Inventorization
 */
class InventorizationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Inventorization[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Inventorization|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
