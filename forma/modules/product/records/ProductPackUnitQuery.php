<?php

namespace forma\modules\product\records;

/**
 * This is the ActiveQuery class for [[ProductPackUnit]].
 *
 * @see ProductPackUnit
 */
class ProductPackUnitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProductPackUnit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductPackUnit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
