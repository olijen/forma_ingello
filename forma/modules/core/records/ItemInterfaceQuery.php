<?php

namespace forma\modules\core\records;

use forma\components\AccessoryModule;

/**
 * This is the ActiveQuery class for [[ItemInterface]].
 *
 * @see ItemInterface
 */
class ItemInterfaceQuery extends \yii\db\ActiveQuery
{
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
    public function oneAccessory($db = null)
    {
        $this->andWhere(['in', 'item_interface.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::one($db);
    }
}