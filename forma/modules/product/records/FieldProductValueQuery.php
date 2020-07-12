<?php

namespace forma\modules\product\records;

/**
 * This is the ActiveQuery class for [[FieldProductValue]].
 *
 * @see FieldProductValue
 */
class FieldProductValueQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return FieldProductValue[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FieldProductValue|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}