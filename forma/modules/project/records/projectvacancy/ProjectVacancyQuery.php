<?php

namespace forma\modules\project\records\projectvacancy;

/**
 * This is the ActiveQuery class for [[ProjectVacancy]].
 *
 * @see ProjectVacancy
 */
class ProjectVacancyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProjectVacancy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProjectVacancy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
