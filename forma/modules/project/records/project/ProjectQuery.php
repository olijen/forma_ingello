<?php

namespace forma\modules\project\records\project;

use forma\components\AccessoryModule;

/**
 * This is the ActiveQuery class for [[Project]].
 *
 * @see Project
 */
class ProjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Project[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function allAccessory($db = null)
    {
        $this->andWhere(['in', 'project.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Project|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
