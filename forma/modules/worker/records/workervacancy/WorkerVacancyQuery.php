<?php

namespace forma\modules\worker\records\workervacancy;

/**
 * This is the ActiveQuery class for [[WorkerVacancy]].
 *
 * @see WorkerVacancy
 */
class WorkerVacancyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return WorkerVacancy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return WorkerVacancy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
