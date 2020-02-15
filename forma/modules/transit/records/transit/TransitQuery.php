<?php

namespace forma\modules\transit\records\transit;

/**
 * This is the ActiveQuery class for [[Transit]].
 *
 * @see Transit
 */
class TransitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Transit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Transit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
