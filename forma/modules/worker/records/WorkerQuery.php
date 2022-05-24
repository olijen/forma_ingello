<?php

namespace forma\modules\worker\records;

use forma\components\AccessoryModule;

/**
 * This is the ActiveQuery class for [[Worker]].
 *
 * @see Worker
 */
class WorkerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Worker[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function allAccessory($db = null)
    {
        $this->andWhere(['in', 'worker.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Worker|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
