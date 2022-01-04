<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[UserRuleRank]].
 *
 * @see UserRuleRank
 */
class UserRuleRankQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UserRuleRank[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserRuleRank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}