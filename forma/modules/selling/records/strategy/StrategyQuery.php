<?php

namespace forma\modules\selling\records\strategy;

use forma\components\AccessoryModule;

/**
 * This is the ActiveQuery class for [[Strategy]].
 *
 * @see Strategy
 */
class StrategyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Strategy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function allAccessory($db = null)
    {
        $this->andWhere(['in', 'strategy.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Strategy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
