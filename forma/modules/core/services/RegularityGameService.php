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
                $ranks [] = $rule->rank->getAttributes();
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


    public function setUserProfileRules(): void
    {
        $userProfileRules = [];
        foreach ($this->regularity->items as $item) {
            foreach ($item->rules as $rule) {
                foreach ($rule->userProfileRules as $userProfileRule){
                    $userProfileRules [] = $userProfileRule->getAttributes();
                }
            }
        }
        $this->userProfileRules = $userProfileRules;
    }
}