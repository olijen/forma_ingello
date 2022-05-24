<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[\forma\modules\core\records\regularity\Item]].
 *
 * @see \forma\modules\core\records\regularity\Item
 */
class ItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \forma\modules\core\records\regularity\Item[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \forma\modules\core\records\regularity\Item|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function publicItems($regularityIds)
    {
            $this->where(['access' => 1, 'regularity_id' => $regularityIds])
                ->orderBy(['order' => SORT_ASC, 'id' => SORT_ASC]);
            return $this;
    }
}
