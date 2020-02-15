<?php

namespace forma\modules\vacancy\records;

/**
 * This is the ActiveQuery class for [[Vacancy]].
 *
 * @see Vacancy
 */
class VacancyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vacancy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vacancy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
