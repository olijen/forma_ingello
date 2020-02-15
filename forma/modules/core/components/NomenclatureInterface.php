<?php

namespace forma\modules\core\components;

use forma\modules\warehouse\records\Warehouse;

interface NomenclatureInterface
{
    /**
     * @return NomenclatureUnitInterface[]
     */
    public function getUnits();

    /**
     * @return Warehouse
     */
    public function getRelatedWarehouse();
}
