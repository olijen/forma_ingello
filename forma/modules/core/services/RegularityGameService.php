<?php

namespace forma\modules\core\services;

use forma\modules\core\records\Item;
use forma\modules\core\records\Rank;
use forma\modules\core\records\Regularity;
use forma\modules\core\records\Rule;
use Yii;

class RegularityGameService
{
    public $items;
    public $rules;
    public $ranks;
    public $regularity;
    public $userProfileRules;

    /**
     * @param $id
     */
    function __construct($id)
    {
        $this->setRegularity(Regularity::find()->where(['regularity.id' => $id])->joinWith(['items' => function ($q) {
            $q->joinWith(['rules' => function ($q) {
                $q->joinWith('rank');
                $q->joinWith('userProfileRules');
            }]);
        }])->one());
        $this->setItems();
        $this->setRules();
        $this->setRanks();
        $this->setUserProfileRules();
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }


    /**
     * @return void
     */
    public function setItems(): void
    {
        $items = [];
        foreach ($this->regularity->items as $item) {
            $items [] = $item->getAttributes();
        }
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    public function setRules(): void
    {
        $rules = [];
        foreach ($this->regularity->items as $item) {
            foreach ($item->rules as $rule) {
                $rules [] = $rule->getAttributes();
            }
        }
        $this->rules = $rules;
    }

    /**
     * @return array
     */
    public function getRanks(): array
    {
        return $this->ranks;
    }

    /**
     * @param mixed $rank
     */
    public function setRanks(): void
    {
        $ranks = [];
        foreach ($this->regularity->items as $item) {
            foreach ($item->rules as $rule) {
                if (isset($rule->rank)) {
                    $ranks [] = $rule->rank->getAttributes();
                }
            }
        }
        $this->ranks = $ranks;
    }

    /**
     * @return Regularity
     */
    public function getRegularity(): Regularity
    {
        return $this->regularity;
    }

    /**
     * @param mixed $regularity
     */
    public function setRegularity($regularity): void
    {
        $this->regularity = $regularity;
    }

    /**
     * @return mixed
     */
    public function getUserProfileRules()
    {
        return $this->userProfileRules;
    }

    /**
     * @param $id
     * @return bool
     * Метод проверки равности по Item[id] и Rule[item_id]
     */
    public function isItemById($id)
    {
        $flag = false;
        foreach ($this->items as $item) {
            if ($item['id'] == $id) {
                foreach ($this->rules as $rule) {
                    if ($rule['item_id'] == $item['id']) {
                        $flag = true;
                    }
                }
                break;
            }
        }
        return $flag;
    }

    /**
     * @return void
     */
    public function setUserProfileRules(): void
    {
        $userProfileRules = [];
        $userId = Yii::$app->user->id;
        foreach ($this->regularity->items as $item) {
            foreach ($item->rules as $rule) {
                foreach ($rule->userProfileRules as $userProfileRule) {
                    if ($userProfileRule->user_id === $userId) {
                        $userProfileRules [] = $userProfileRule->getAttributes();
                    }
                }
            }
        }
        $this->userProfileRules = $userProfileRules;
    }

    /**
     * @param $id
     * @return array
     * Метод получения элементов доступа по Рангу
     */
    public function getGrantInterfaceByRankId($id)
    {
        $params = Yii::$app->params['access-interface'];
        $arrayGrantInterface = [];
        $rank = Rank::find()->where(['id' => $id])->oneAccessory();

        if (isset($rank)) {
            foreach ($rank->itemInterfaces as $itemInterface) {
                $arrayGrantInterface [] = $params[$itemInterface->module][$itemInterface->key];
            }
        }

        return $arrayGrantInterface;
    }

    /**
     * @var Rule[] $rules
     * Метод получения Ранга по Элементу
     */
    public function getRankIdByItemId($id)
    {
        $rules = $this->getRules();
        $rankId = null;
        foreach ($rules as $rule) {
            if ($rule['item_id'] == $id) {
                $rankId = $rule['rank_id'];
                break;
            }
        }
        return $rankId;
    }

    public function isCompletedRulesByItemId($id)
    {
        $countCompletedRulesByUser = [];
        $userId = Yii::$app->user->id;
        foreach ($this->rules as $rule) {
            if ($rule['item_id'] == $id) {
                $countRulesByUser = 0;
                foreach ($this->userProfileRules as $userProfileRule) {
                    if ($rule['id'] === $userProfileRule['rule_id'] && $userProfileRule['user_id'] === $userId) {
                        $countRulesByUser++;
                    }
                }

                if ($rule['count_action'] === $countRulesByUser) {
                    $countCompletedRulesByUser [] = true;
                } else {
                    $countCompletedRulesByUser [] = false;
                }
            }
        }

        if (empty($countCompletedRulesByUser)) {
            return false;
        }

        if (!in_array(false, $countCompletedRulesByUser)) {
            return true;
        }

        return false;
    }

    public function isCompletedItemByRegularityId()
    {
        $countRulesFromItem = [];
        foreach ($this->regularity->items as $item) {
            if (!empty($item->rules)) {
                $countRulesFromItem [] = $this->isCompletedRulesByItemId($item->id);
            }
        }

        if (empty($countRulesFromItem)) {
            return false;
        }

        if (!in_array(false, $countRulesFromItem)) {
            return true;
        }

        return false;
    }
}