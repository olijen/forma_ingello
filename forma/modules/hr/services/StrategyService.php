<?php

namespace forma\modules\hr\services;


use forma\modules\hr\records\talk\Strategy;
use yii\helpers\ArrayHelper;

class StrategyService
{

    /**
     * @return Strategy
     */
    public static function getStrategy()
    {
        return new Strategy();
    }

    /**
     * @return Strategy[]|array
     */
    public static function getStrategies()
    {
        return Strategy::find()->all();
    }

    /**
     * @return array Strategy[]
     */
    public static function getList()
    {
        return ArrayHelper::map(Strategy::find()->all(), 'id', 'name');
    }

}