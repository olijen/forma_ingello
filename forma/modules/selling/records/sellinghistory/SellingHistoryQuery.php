<?php

namespace forma\modules\selling\records\sellinghistory;

/**
 * This is the ActiveQuery class for [[SellingHistory]].
 *
 * @see SellingHistory
 */
class SellingHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SellingHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SellingHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}