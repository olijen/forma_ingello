<?php

namespace forma\modules\test\records;

/**
 * This is the ActiveQuery class for [[TestType]].
 *
 * @see TestType
 */
class TestTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TestType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TestType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
