<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[ItemRule]].
 *
 * @see ItemRule
 */
class ItemRuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ItemRule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemRule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}