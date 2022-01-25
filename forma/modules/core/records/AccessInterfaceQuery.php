<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[AccessInterface]].
 *
 * @see AccessInterface
 */
class AccessInterfaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AccessInterface[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AccessInterface|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}