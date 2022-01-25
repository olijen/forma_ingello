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

    public static function init()
    {
        self::setUserProfile(User::find()->joinWith(['userProfileRules'])
            ->where(['user.id' => Yii::$app->user->id])->one());
    }

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

    /**
     * @param Rule $rule
     * @return array|Rank|null
     * Метод возвращает Ранг, который пользователь хочет получить
     */
    public function getNewRank(Rule $rule)
    {
        return Rank::find()->where(['rank.id' => $rule->rank_id])->joinWith(['rules' => function ($q) {
            $q->joinWith('userProfileRules');
        }])->one();
    }

    /**
     * @return array|Rank|null
     * Метод возврвщает текущий Ранг пользователя
     */
    public function getCurrenRank()
    {
        return Rank::find()->where(['rank.id' => self::getUserProfile()->userProfile->rank_id])->joinWith(['rules' => function ($q) {
            $q->joinWith('userProfileRules');
        }])->one();
    }

    /**
     * @param Rule $rule
     * @return void
     * Метод принимает добавляет новую запись в таблицу UserProfileRule, если он еще не выполил задание
     */
    public function addNewUserProfileRule(Rule $rule)
    {
        $currentDate = date('Y-m-d');
        $newUserProfileRule = new UserProfileRule();
        $newUserProfileRule->rule_id = $rule->id;
        $newUserProfileRule->user_id = self::getUserProfile()->id;
        $newUserProfileRule->date = $currentDate;
        $newUserProfileRule->save();
    }

    /**
     * @param Rule $rule
     * @return bool|void
     * Метод перезаписи ранга, если пользователь выполнил все задания по рангу
     */
    public function setEvent(Rule $rule)
    {
        $currentRank = $this->getCurrenRank();
        $countRule = 0;

        foreach (self::getUserProfile()->userProfileRules as $profileRule) {
            if ($profileRule->rule_id == $rule->id) {
                $countRule++;
            }
        }

        if ($rule->count_action > $countRule) {
            $this->addNewUserProfileRule($rule);
        }

        $newRank = $this->getNewRank($rule);
        $countCurrentBall = 0;
        $needCountBall = count($newRank->rules);
        foreach ($newRank->rules as $itemRule) {
            if ($itemRule->count_action == count($itemRule->userProfileRules)) {
                $countCurrentBall++;
            }
        }
        if ($needCountBall == $countCurrentBall) {
            if (!isset($currentRank)) {
                self::getUserProfile()->userProfile->rank_id = $newRank->id;
                if (self::getUserProfile()->userProfile->save()) {
                    $this->setCookieSystemEvent('event', $newRank->id);
                    return true;
                }
            }
            if (isset(self::getUserProfile()->userProfile->rank)) {
                if ($newRank->order > $currentRank->order) {
                    self::getUserProfile()->userProfile->rank_id = $newRank->id;
                    if (self::getUserProfile()->userProfile->save()) {
                        $this->setCookieSystemEvent('event', $newRank->id);
                        return true;
                    }
                } else {
                    return true;
                }
            }
        }
    }

    /**
     * @param string $name
     * @param int $rule_id
     * @return void
     * Метод записывает cookie если пользователь выполнил все задания
     */
    public function setCookieSystemEvent(string $name, int $rule_id)
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => $name,
            'value' => [$rule_id],
        ]));
    }
}