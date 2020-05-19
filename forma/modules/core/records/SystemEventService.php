<?php


namespace forma\modules\core\records;


use forma\modules\core\records\SystemEventUserService;
use Yii;
class SystemEventService
{

    public static $models = [];

    public static $blackListOfEvents = [
        'SystemEvent',
        'Accessory'
    ];

    public static function init(){
        self::$models = SystemEventUserService::getModels();
        Yii::debug(self::$models);
    }

    public static function getClassName($event){
        $classNameWithNS = $event->sender::className();
        $className = explode('\\', $event->sender::className())[count(explode('\\', $event->sender::className()))-1];
        return $className;
    }

    public static function checkBlackList($className){
        if (in_array($className, self::$blackListOfEvents))
            return false;

        return true;
    }

    public static function loadSystemEvent(){
        $systemEvent = new SystemEvent();
        $systemEvent->user_id = !is_null(Yii::$app->user->id) ? Yii::$app->user->id : 1;
        $systemEvent->date_time = date('Y-m-d H:i:s');
        $systemEvent->module = 'Modpule'; //$modules[$className];
        //$systemEvent->district = $districts[$this->module];

        return $systemEvent;
    }

    public static function eventAfterInsert($event){
        $model = $event->sender;
        $className = self::getClassName($event);
        //получить массив со названиями тех объектов, на которые есть подписка
        //сравнить по названиям, и если есть такое, то отправить сообщение
        $s = SystemEventUser::findAll(['user_id' => Yii::$app->user->id]);
        $sendEmail = false;
        foreach($s as $k => $v) {
            if($s[$k]->object_name == $className) $sendEmail = true;
        }

        $objectName = "";

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';

            $systemEvent = self::loadSystemEvent();
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = $className . ' Created: "' . $objectName . '" by user '.$systemEvent->user_id;
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
        }

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($className, $objectName);
    }

    public static function eventAfterUpdate($event) {
        $model = $event->sender;
        $className = self::getClassName($event);

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';

            $systemEvent = self::loadSystemEvent();
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = $className . ' Updated: "' . $objectName . '" by user '.$systemEvent->user_id;
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
        }
    }

    public static function eventAfterDelete($event){
        $model = $event->sender;
        $className = self::getClassName($event);

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';

            $systemEvent = self::loadSystemEvent();
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = $className . ' Deleted: "' . $objectName . '" by user '.$systemEvent->user_id;
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
        }
    }

}