<?php

namespace forma\modules\warehouse\records;

/**
 * This is the ActiveQuery class for [[WarehouseProduct]].
 *
 * @see WarehouseProduct
 */
class WarehouseProductQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return WarehouseProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WarehouseProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
