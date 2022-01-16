<?php

namespace forma\modules\core\services;

use forma\modules\core\records\User;
use forma\modules\core\records\UserProfileRule;
use Yii;

class UserProfileChartService
{
    public function getDateForCount()
    {
        $date = strtotime('monday this week');
        $dates = [];
        for ($i = 1; $i < 8; $i++) {
            $dates[date("Y-m-d", $date)] = 0;
            $date = strtotime('+1 day', $date);
        }
        $user = User::find()->where(['id'=>Yii::$app->user->id])->one();
        $count = UserProfileRule::find()->where(['user_id' => $user->id])
            ->select(['date,count(*) as countRule'])
            ->groupBy('date')
            ->asArray()
            ->all();

        $chartValue = \yii\helpers\ArrayHelper::map($count, 'date', 'countRule');

        foreach ($dates as $k => $i) {
            foreach ($chartValue as $key => $item) {
                if ($k == $key) {
                    $dates[$k] = $item;
                }
            }
        }
        $dates = array_reverse($dates);
        return $dates;

    }

    public function getDate()
    {
        $dateForCount = $this->getDateForCount();
        $dates = '';
        foreach ($dateForCount as $date => $count) {
            setlocale(LC_TIME, "C");

            $dates .= '\'' . $date . '\',' . ',\'' . strftime("%A+1 days") . '\',';
        }
        return $dates;

    }

    public function getCount()
    {
        $countForDate = $this->getDateForCount();
        $counts = '';
        foreach ($countForDate as $count) {

            $counts .= '\'' . $count . '\',';
        }
        return $counts;
    }
}
