<?php

namespace forma\modules\vacancy\records;

use forma\components\AccessoryModule;

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

    public function allAccessory($db = null)
    {
        $this->andWhere(['in', 'vacancy.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
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
