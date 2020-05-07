<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[SystemEvent]].
 *
 * @see SystemEvent
 */
class SystemEventQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SystemEvent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SystemEvent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
