<?php

namespace forma\modules\core\records;

use forma\components\AccessoryModule;

/**
 * This is the ActiveQuery class for [[Rule]].
 *
 * @see Rule
 */
class RuleQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Rule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function oneAccessory($db = null)
    {
        $this->andWhere(['in', 'rule.id', AccessoryModule::getAccessoryIdS($this->modelClass)]);
        return parent::one($db);
    }
}