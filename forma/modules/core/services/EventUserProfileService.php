<?php

namespace forma\modules\core\services;

use forma\modules\core\records\Rank;
use forma\modules\core\records\Rule;
use forma\modules\core\records\UserProfile;
use forma\modules\core\records\UserProfileRule;
use Yii;

class EventUserProfileService
{

    /**
     * @param UserProfile $userProfile
     */

    public static $userProfile;

    public static function setUserProfile(UserProfile $userProfile): void
    {
        self::$userProfile = $userProfile;
    }

    /**
     * @return UserProfile
     */
    public static function getUserProfile(): UserProfile
    {
        return self::$userProfile;
    }

    public function getNewRank(Rule $rule)
    {
        return Rank::find()->where(['rank.id' => $rule->rank_id])->joinWith(['rules' => function ($q) {
            $q->joinWith('userProfileRules');
        }])->one();
    }

    public function getCurrenRank()
    {
        return Rank::find()->where(['rank.id' => self::getUserProfile()->rank_id])->joinWith(['rules' => function ($q) {
            $q->joinWith('userProfileRules');
        }])->one();
    }

    public function setEvent(Rule $rule)
    {
        self::setUserProfile(UserProfile::find()->where(['user_id' => Yii::$app->user->id])->joinWith('userProfileRules')->one());
        $newRank = $this->getNewRank($rule);
        $currentRank = $this->getCurrenRank();
        $currentDate = date('Y-m-d');
        $countRule = 0;

        foreach (self::getUserProfile()->userProfileRules as $profileRule) {
            if ($profileRule->rule_id == $rule->id) {
                $countRule++;
            }
        }

        if ($rule->count_action > $countRule) {
            $newUserProfileRule = new UserProfileRule();
            $newUserProfileRule->rule_id = $rule->id;
            $newUserProfileRule->user_profile_id = self::getUserProfile()->id;
            $newUserProfileRule->date = $currentDate;
            $newUserProfileRule->save();
        }

        if ($rule->count_action >= $countRule) {
            $countCurrentBall = 0;
            $needCountBall = count($newRank->rules);
            foreach ($newRank->rules as $itemRule) {
                $countUserProfileRule = 0;
                foreach (self::getUserProfile()->userProfileRules as $userProfileRule) {
                    if ($userProfileRule->rule_id == $itemRule->id) {
                        $countUserProfileRule++;
                    }
                }
                if ($itemRule->count_action == $countUserProfileRule) {
                    $countCurrentBall++;
                }
            }
            if ($countCurrentBall <= $needCountBall) {
                if (empty(self::getUserProfile()->rank)) {
                    self::getUserProfile()->rank_id = $newRank->id;
                    if (self::getUserProfile()->save()) {
                        return true;
                    }
                }
                if (isset($currentRank)) {
                    if ($newRank->order > $currentRank->order) {
                        self::getUserProfile()->rank_id = $newRank->id;
                        if (self::getUserProfile()->save()) {
                            return true;
                        }
                    }
                }
            }
        }
    }
}