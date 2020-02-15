<?php

namespace forma\modules\overheadcost\records;

/**
 * This is the ActiveQuery class for [[OverheadCost]].
 *
 * @see OverheadCost
 */
class OverheadCostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OverheadCost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OverheadCost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
