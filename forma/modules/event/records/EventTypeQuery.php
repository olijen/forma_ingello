<?php

namespace forma\modules\event\records;

/**
 * This is the ActiveQuery class for [[EventType]].
 *
 * @see EventType
 */
class EventTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EventType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EventType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}