<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[SystemEventUser]].
 *
 * @see SystemEventUser
 */
class SystemEventUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SystemEventUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SystemEventUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
