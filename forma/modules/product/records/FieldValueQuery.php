<?php

namespace forma\modules\product\records;

/**
 * This is the ActiveQuery class for [[FieldValue]].
 *
 * @see FieldValue
 */
class FieldValueQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return FieldValue[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FieldValue|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}