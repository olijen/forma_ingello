<?php

namespace forma\modules\selling\records\talk;

use forma\components\AccessoryModule;

/**
 * This is the ActiveQuery class for [[Request]].
 *
 * @see \forma\modules\script\models\records\Request
 */
class RequestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \forma\modules\selling\records\talk\Request[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function allAccessory($db = null)
    {
        $this->andWhere(['in', 'request.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \forma\modules\selling\records\talk\Request|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
