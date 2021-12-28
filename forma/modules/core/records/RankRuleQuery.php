<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[RankRule]].
 *
 * @see RankRule
 */
class RankRuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return RankRule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RankRule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}