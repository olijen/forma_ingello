<?php

namespace forma\modules\hr\services;


use forma\modules\hr\records\talk\RequestStrategy;

/**
 * Class RequestStrategyService
 * @package forma\modules\script\services
 */
class RequestStrategyService
{

    /**
     * @param $id
     * @return mixed
     */
    public static function getStrategyRequests($id)
    {
        $requestStrategy = RequestStrategy::find()->where(['strategy_id' => $id])->one();
        $strategy = $requestStrategy->getStrategy()->one();

        return $strategy->getRequests()->all();
    }

}