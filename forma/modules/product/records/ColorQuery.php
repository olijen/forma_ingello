<?php

namespace forma\modules\product\records;

/**
 * This is the ActiveQuery class for [[Color]].
 *
 * @see Color
 */
class ColorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Color[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Color|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
