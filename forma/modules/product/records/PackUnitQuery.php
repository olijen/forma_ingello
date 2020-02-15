<?php

namespace forma\modules\product\records;

/**
 * This is the ActiveQuery class for [[PackUnit]].
 *
 * @see PackUnit
 */
class PackUnitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PackUnit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PackUnit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
