<?php

namespace forma\modules\hr\records\interviewvacancy;

/**
 * This is the ActiveQuery class for [[SellingProduct]].
 *
 * @see SellingProduct
 */
class InterviewVacancyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InterviewVacancy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InterviewVacancy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
