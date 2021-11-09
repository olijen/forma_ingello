<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[Rule]].
 *
 * @see Rule
 */
class RuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Rule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}