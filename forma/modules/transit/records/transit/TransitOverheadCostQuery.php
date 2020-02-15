<?php

namespace forma\modules\transit\records\transit;

/**
 * This is the ActiveQuery class for [[TransitOverheadCost]].
 *
 * @see TransitOverheadCost
 */
class TransitOverheadCostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TransitOverheadCost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransitOverheadCost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
