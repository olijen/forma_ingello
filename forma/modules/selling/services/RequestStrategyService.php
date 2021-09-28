<?php

namespace forma\modules\selling\services;


use forma\modules\selling\records\talk\RequestStrategy;

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
        if(!empty(RequestStrategy::find()->where(['strategy_id' => $id])->one())){
            $requestStrategy = RequestStrategy::find()->where(['strategy_id' => $id])->one();
            $strategy = $requestStrategy->getStrategy()->one();

            return $strategy->getRequests()->all();
        }

    }

}