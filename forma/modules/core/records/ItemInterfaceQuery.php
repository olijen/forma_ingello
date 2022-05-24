<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[ItemInterface]].
 *
 * @see ItemInterface
 */
class ItemInterfaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ItemInterface[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemInterface|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}