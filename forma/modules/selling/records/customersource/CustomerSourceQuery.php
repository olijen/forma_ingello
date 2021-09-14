<?php

namespace forma\modules\selling\records\customersource;
use \yii\db\ActiveQuery;
/**
 * This is the ActiveQuery class for [[CustomerSource]].
 *
 * @see CustomerSource
 */
class CustomerSourceQuery extends ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CustomerSource[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CustomerSource|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}