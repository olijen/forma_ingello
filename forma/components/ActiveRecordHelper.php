<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 03.11.18
 * Time: 19:59
 */

namespace forma\components;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ActiveRecordHelper
{
    /**
     * @param $modelClass ActiveRecord
     * @param string $labelAttribute
     * @return array
     */
    public static function getList($modelClass, $labelAttribute = 'name')
    {
        return self::getListByQuery($modelClass::find(), $labelAttribute);
    }

    /**
     * @param ActiveQuery $query
     * @param string $labelAttribute
     * @return array
     */
    public static function getListByQuery(ActiveQuery $query, $labelAttribute = 'name')
    {
        return ArrayHelper::map($query->all(), 'id', $labelAttribute);
    }
}
