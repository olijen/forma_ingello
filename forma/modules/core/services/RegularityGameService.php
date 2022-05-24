<?php

namespace forma\modules\core\services;

use forma\modules\core\records\AccessInterface;
use forma\modules\core\records\Regularity;
use forma\modules\core\records\RegularityQuery;
use forma\modules\core\records\Rule;
use Yii;

class RegularityGameService
{
    public $rulesData;
    public $rule;
    public $userData;
    public $regularity;
    public $countRegularityItem = 0;
    public $countRightRegularityItem = 0;

    function __construct($itemId)
    {
        $this->rulesData = Rule::find()->joinWith(['itemRule' => function ($q) {
            $q->joinWith('itemInterface');
        }])->all();
        $this->userData = AccessInterface::find()->where(['user_id' => Yii::$app->user->id])->all();
        $this->setCurrentRule($itemId);
        $this->setRegularity();
        $this->setCurrentMarkByRegularity();
    }

    public function getRegularity()
    {
        return $this->regularity;
    }

    public function setCurrentRule($itemId)
    {
        $this->rule = Rule::find()->joinWith(['item' => function ($q) {
            $q->joinWith('regularity');
        }])->where(['rule.id' => $itemId])->one();
    }

    public function setRegularity()
    {
        $this->regularity = (new RegularityQuery(new Regularity()))->publicRegularities($this->getUserData()[0]->user_id)
            ->where(['id' => $this->rule->item->regularity->id])->one();
    }

    /**
     * @return mixed
     */
    public function getRulesData()
    {
        return $this->rulesData;
    }

    public function setCurrentMarkByRegularity()
    {
        foreach ($this->regularity->items as $regularityItem) {
            foreach ($this->rulesData as $rulesDatum) {
                if ($rulesDatum->item_id == $regularityItem->id) {
                    $this->countRegularityItem++;
                    foreach ($this->userData as $userDatum) {
                        if ($userDatum->rule_id == $rulesDatum->id && $userDatum->status == 1) {
                            $this->countRightRegularityItem++;
                        }
                    }
                }
            }
        }
    }

    public function isAllRightItemByRegularity(): bool
    {
        if ($this->countRegularityItem == $this->countRightRegularityItem && $this->countRegularityItem != 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array|AccessInterface[]
     */
    public function getUserData(): array
    {
        return $this->userData;
    }
}