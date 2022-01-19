<?php

namespace forma\modules\core\services;

use DateInterval;
use DatePeriod;
use DateTime;
use forma\modules\core\records\User;
use forma\modules\core\records\UserProfileRule;
use Yii;

class UserProfileChartService
{

    public function getDateForCount($date = null)
    {
        if ($date !== null) {
            $dateFrom = $date['from_date'];
            $dateTo = $date['to_date'];
            $count = UserProfileRule::find()
                ->select(['date', 'count(*) AS countRule'])
                ->andFilterWhere(['between', 'date', $dateFrom, $dateTo])
                ->groupBy('date')
                ->asArray()
                ->all();

            $chartValue = \yii\helpers\ArrayHelper::map($count, 'date', 'countRule');

            function getDatesFromRange($dateFrom, $dateTo, $format = 'Y-m-d')
            {
                $array = array();
                $interval = new DateInterval('P1D');

                $realEnd = new DateTime($dateTo);
                $realEnd->add($interval);

                $period = new DatePeriod(new DateTime($dateFrom), $interval, $realEnd);

                foreach ($period as $date) {
                    $array[] = $date->format($format);
                }

                return $array;
            }

            $dateRange = getDatesFromRange($dateFrom, $dateTo);
            $dates = [];
            for ($i = 0; $i < count($dateRange); $i++) {
                $dates[$dateRange[$i]] = 0;
            }

        } else {

            $user = User::find()->where(['id' => Yii::$app->user->id])->one();
            $count = UserProfileRule::find()->where(['user_id' => $user->id])
                ->select(['date,count(*) as countRule'])
                ->groupBy('date')
                ->asArray()
                ->all();


            $chartValue = \yii\helpers\ArrayHelper::map($count, 'date', 'countRule');

            $date = strtotime('monday this week');
            $dates = [];
            for ($i = 1; $i < 8; $i++) {
                $dates[date("Y-m-d", $date)] = 0;
                $date = strtotime('+1 day', $date);
            }
        }

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

    public function getDate($date = null)
    {
        if ($date !== null) {
            $dateForCount = $this->getDateForCount($date);
            $dates = '';
            foreach ($dateForCount as $date => $count) {
                $dates .= '\'' . $date . '\',';

            }
            $dates = substr($dates, 0, -2);
            $dates = substr($dates, 1);
        } else {
//            $dateForCount = $this->getDateForCount();
            $dates = "'ВС','СБ','ПТ','ЧТ','СР','ВТ','ПН',";
//            foreach ($dateForCount as $date => $count) {
//                setlocale(LC_TIME, "C");
//
//                $dates .= '\'' . $date . '\',' . ',\'' . strftime("%A+1 days") . '\',';
//            }
        }
//        de($dates);

        return $dates;

    }

    public function getCount($data = null)
    {

        $countForDate = $this->getDateForCount($data);
//        de($countForDate);
        $counts = '';
        foreach ($countForDate as $count) {

            $counts .= '\'' . $count . '\',';
        }
//        $counts = substr($counts,0,-2);
//        $counts = substr($counts,1);
//        de($counts);
        return $counts;
    }

}


