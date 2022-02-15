<?php

namespace forma\modules\core\records;

use forma\components\AccessoryModule;

/**
 * This is the ActiveQuery class for [[Rank]].
 *
 * @see Rank
 */
class RankQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Rank[]|array
     */
    public function allAccessory($db = null)
    {
        $this->andWhere(['in', 'rank.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rank|array|null
     */
    public function oneAccessory($db = null)
    {
        $this->andWhere(['in', 'rank.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::one($db);
    }

    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}