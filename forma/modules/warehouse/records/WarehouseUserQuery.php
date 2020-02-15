<?php

namespace forma\modules\warehouse\records;

/**
 * This is the ActiveQuery class for [[WarehouseUser]].
 *
 * @see WarehouseUser
 */
class WarehouseUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return WarehouseUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WarehouseUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
