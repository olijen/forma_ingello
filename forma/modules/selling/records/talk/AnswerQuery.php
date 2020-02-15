<?php

namespace forma\modules\selling\records\talk;

/**
 * This is the ActiveQuery class for [[Answer]].
 *
 * @see Answer
 */
class AnswerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return  \forma\modules\script\models\Answer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \forma\modules\script\models\Answer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
