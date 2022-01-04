<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[RuleRank]].
 *
 * @see RuleRank
 */
class RuleRankQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return RuleRank[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RuleRank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}