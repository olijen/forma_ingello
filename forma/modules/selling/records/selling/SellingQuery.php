<?php

namespace forma\modules\selling\records\selling;

/**
 * This is the ActiveQuery class for [[Selling]].
 *
 * @see Selling
 */
class SellingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Selling[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Selling|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
