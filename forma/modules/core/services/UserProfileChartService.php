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
    //получаю массив с периодом от и до
    public function getDatesFromRange($dateFrom, $dateTo, $format)
    {
        $array = [];
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($dateTo);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($dateFrom), $interval, $realEnd);

        foreach ($period as $date) {
            $array[] = $date->format($format);
        }

        return $array;
    }

    public function getDateCount($dateFrom = null, $dateTo = null)
    {

        $count = UserProfileRule::find()->where(['user_id' => Yii::$app->user->id])
            ->select(['date', 'count(*) AS countRule'])
            ->groupBy('date')
            ->andFilterWhere(['between', 'date', $dateFrom, $dateTo])
            ->asArray()
            ->all();

        $chartValue = \yii\helpers\ArrayHelper::map($count, 'date', 'countRule');
        return $chartValue;

    }

    //получаем массив дата => количество
    public function getDateForCount($date = null)
    {
        if ($date !== null) {
            $dateFrom = $date['from_date'];
            $dateTo = $date['to_date'];
            $format = 'Y-m-d';

            $chartValue = $this->getDateCount($dateFrom, $dateTo);
            $dateRange = $this->getDatesFromRange($dateFrom, $dateTo, $format);
            $dates = [];
            for ($i = 0; $i < count($dateRange); $i++) {
                $dates[$dateRange[$i]] = 0;
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

    public function getData()
    {
        $dateTo = date("Y-m-d");
        $date = DateTime::createFromFormat('Y-m-d', $dateTo);
        $date->modify('-6 day');
        $dateTo = $date->format('Y-m-d');
        $dateFrom = date('Y-m-d');
        $format = 'D';

        $chartValue = $this->getDateCount($dateTo, $dateFrom);

        $dateRange = $this->getDatesFromRange($dateTo, $dateFrom, $format);
        $dateRange = array_reverse($dateRange);

        $dates = [];
        for ($i = 0; $i < count($dateRange); $i++) {
            $dates[$dateRange[$i]] = 0;
        }
        foreach ($dates as $k => $i) {
            foreach ($chartValue as $key => $item) {
                $week = DateTime::createFromFormat('Y-m-d', $key);
                $key = $week->format('D');
                if ($k == $key) {
                    $dates[$k] = $item;
                }
            }
        }
        $date = '';
        $count = '';
        $dates = array_reverse($dates);
        foreach ($dates as $k => $i) {
            $date .= '\'' . $k . '\',';
            $count .= '\'' . $i . '\',';

        }
        $date = substr($date, 0, -1);
        $count = substr($count, 0, -1);
        $data = [$date, $count];
        return ($data);


    }

    public function getDateWitchPost($date = null)
    {
        $dateForCount = $this->getDateForCount($date);
        $dates = '';
        $counts = '';
        foreach ($dateForCount as $date => $count) {

            $dates .= '\'' . $date . '\',';
            $counts .= '\'' . $count . '\',';
        }
        $dates = substr($dates, 0, -1);
        $counts = substr($counts, 0, -1);
        $data = [$dates, $counts];

        return $data;

    }


}


