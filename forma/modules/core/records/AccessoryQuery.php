<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[Accessory]].
 *
 * @see Accessory
 */
class AccessoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Accessory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Accessory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
