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
        foreach ($getWithoutEmptyStrategies as $key => $arr) {
            $temp[] = $key;
        }
        $isSelling = null;
        if (isset($_GET['isSelling'])) {
            $isSelling = \Yii::$app->request->get('isSelling');
            $getStrategiesUser = Strategy::find()->where(['in', 'id', $temp])
                ->andWhere(['is_selling' => $isSelling])->all();
        } else {
            $getStrategiesUser = Strategy::find()->where(['in', 'id', $temp])->all();
        }
        return $this->render('index', compact('getWithoutEmptyStrategies', 'getStrategiesUser', 'isSelling'));
    }
    public function actionHashForEvent()
    {
        $id = $_POST['id'];
        $request = Request::find()->joinWith('requestStrategies')->joinWith('answers')->where(['request_strategy.strategy_id'=>$id])->asArray()->all();
        return $this->asJson($request);
    }

}