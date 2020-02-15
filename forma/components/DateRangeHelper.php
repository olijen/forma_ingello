<?php

namespace forma\components;

use yii\db\ActiveRecord;

class DateRangeHelper
{
    public static function getDateRangeCondition($field, $range, $separator = ' - ')
    {
        if (is_string($range)) {
            $range = explode($separator, $range);
        }
        $fromDatetime = date('Y-m-d', strtotime($range[0]));
        $toDatetime = date('Y-m-d', strtotime($range[1]));
        $fromDatetime .= ' 00:00:00';
        $toDatetime .= ' 23:59:59';

        return ['BETWEEN', $field, $fromDatetime, $toDatetime];
    }

    public static function getDateRangeValue($attribute, ActiveRecord $searchModel)
    {
        return $_GET[$searchModel->formName()][$attribute . 'Range']
            ?? self::getDataRange($searchModel::className(), $attribute);
    }

    /**
     * @param $modelClass ActiveRecord
     * @param $attribute
     * @param string $separator
     * @return null|string
     */
    private static function getDataRange($modelClass, $attribute, $separator = ' - ')
    {
        $dateRange = self::selectDataRange($modelClass, $attribute);
        if (!$dateRange['min']) {
            return null;
        }
        $min = date('d.m.Y', strtotime($dateRange['min']));
        $max = date('d.m.Y', strtotime($dateRange['max']));
        return "$min $separator $max";
    }

    /**
     * @param $modelClass ActiveRecord
     * @param $attribute
     * @return mixed
     */
    private static function selectDataRange($modelClass, $attribute)
    {
        return $modelClass::find()
            ->select(["MIN($attribute) AS min", "MAX($attribute) AS max"])
            ->asArray()->one();
    }
}
