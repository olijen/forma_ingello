<?php

namespace forma\modules\product\records;

/**
 * This is the ActiveQuery class for [[Manufacturer]].
 *
 * @see Manufacturer
 */
class ManufacturerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Manufacturer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Manufacturer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
