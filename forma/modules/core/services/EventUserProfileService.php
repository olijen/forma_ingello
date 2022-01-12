<?php

namespace forma\modules\core\services;

use forma\modules\core\records\Rank;
use forma\modules\core\records\Rule;
use forma\modules\core\records\User;
use forma\modules\core\records\UserProfileRule;
use Yii;
use function GuzzleHttp\Promise\all;

class EventUserProfileService
{

    /**
     * @param User $userProfile
     */

    public static $userProfile;

    public static function setUserProfile(User $userProfile): void
    {
        self::$userProfile = $userProfile;
    }

    /**
     * @return User
     */
    public static function getUserProfile(): User
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
        return Rank::find()->where(['rank.id' => self::getUserProfile()->userProfile->rank_id])->joinWith(['rules' => function ($q) {
            $q->joinWith('userProfileRules');
        }])->one();
    }

    public function setEvent(Rule $rule)
    {
        self::setUserProfile(User::find()->joinWith(['userProfileRules'])->where(['user.id' => Yii::$app->user->id])->one());

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
            $newUserProfileRule->user_id = self::getUserProfile()->id;
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
                if (empty(self::getUserProfile()->userProfile->rank)) {
                    self::getUserProfile()->userProfile->rank_id = $newRank->id;
                    if (self::getUserProfile()->userProfile->save()) {
                        return true;
                    }
                }
                if (isset($currentRank)) {
                    if ($newRank->order > $currentRank->order) {
                        self::getUserProfile()->userProfile->rank_id = $newRank->id;
                        if (self::getUserProfile()->userProfile->save()) {
                            return true;
                        }
                    }
                }
            }
        }
    }
}