<?php

namespace forma\modules\selling\controllers;


use forma\components\Controller;
use forma\modules\event\records\Event;
use forma\modules\selling\records\requeststrategy\RequestStrategy;
use forma\modules\selling\records\strategy\Strategy;
use forma\modules\selling\records\talk\Request;
use yii\helpers\ArrayHelper;

class SpeechModuleController extends Controller
{

    public function actionIndex()
    {
        $strategies = new Strategy();
        $getWithoutEmptyStrategies = $strategies->getListWithoutEmptyStrategy();
        $temp = [];
        foreach($getWithoutEmptyStrategies as $key => $arr){
            $temp[] = $key;
        }
        $getStrategiesUser = Strategy::find()->where(['in', 'id', $temp])->all();
        return $this->render('index',compact('getWithoutEmptyStrategies',$getWithoutEmptyStrategies,'getStrategiesUser',$getStrategiesUser));
    }
    public function actionHashForEvent()
    {
        $id = $_POST['id'];
        $request = Request::find()->joinWith('requestStrategies')->joinWith('answers')->where(['request_strategy.strategy_id'=>$id])->asArray()->all();
        return $this->asJson($request);
    }

}