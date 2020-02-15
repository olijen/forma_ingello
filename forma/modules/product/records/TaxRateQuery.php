<?php

namespace forma\modules\product\records;

/**
 * This is the ActiveQuery class for [[TaxRate]].
 *
 * @see TaxRate
 */
class TaxRateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TaxRate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaxRate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
