<?php

namespace forma\modules\hr\records\interviewstate;

/**
 * This is the ActiveQuery class for [[InterviewState]].
 *
 * @see InterviewState
 */
class InterviewStateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return InterviewState[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InterviewState|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}