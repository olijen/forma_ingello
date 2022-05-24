<?php

namespace forma\modules\hr\records\victim;

/**
 * This is the ActiveQuery class for [[Victim]].
 *
 * @see Victim
 */
class VictimQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Victim[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Victim|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
