<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[Rank]].
 *
 * @see Rank
 */
class RankQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Rank[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}