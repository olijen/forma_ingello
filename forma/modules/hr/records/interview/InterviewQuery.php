<?php

namespace forma\modules\hr\records\interview;

/**
 * This is the ActiveQuery class for [[Selling]].
 *
 * @see Interview
 */
class InterviewQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Interview[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Interview|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
