<?php

namespace forma\modules\test\records;

/**
 * This is the ActiveQuery class for [[TestTypeField]].
 *
 * @see TestTypeField
 */
class TestTypeFieldQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TestTypeField[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TestTypeField|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
