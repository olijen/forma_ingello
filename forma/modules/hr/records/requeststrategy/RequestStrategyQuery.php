<?php

namespace forma\modules\hr\records\requeststrategy;

/**
 * This is the ActiveQuery class for [[RequestStrategy]].
 *
 * @see RequestStrategy
 */
class RequestStrategyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RequestStrategy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RequestStrategy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
