<?php

namespace forma\modules\selling\records\talk;

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
     * @return \forma\modules\selling\records\talk\Strategy[]|array
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
