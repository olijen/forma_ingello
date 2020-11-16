<?php

namespace forma\modules\selling\services;


use forma\modules\selling\records\talk\Strategy;
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
        return ArrayHelper::map((new \forma\modules\selling\records\strategy\StrategySearch())->createQuery()->all(), 'id', 'name');
    }

}