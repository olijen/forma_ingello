<?php

namespace forma\modules\hr\records\strategy;

/**
 * This is the ActiveQuery class for [[Strategy]].
 *
 * @see Strategy
 */
class StrategyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Strategy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Strategy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
