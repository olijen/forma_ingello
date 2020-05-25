<?php


namespace forma\modules\core\records;


use forma\modules\core\records\SystemEventUserService;
use Yii;
use forma\modules\selling\records\selling\Selling;
class SystemEventService
{

    public static $models = [];

    public static $blackListOfEvents = [
        'SystemEvent',
        'Accessory',
        'StateSearchState',
        'SystemEventUser'
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

    public static function loadSystemEvent($data){
        $systemEvent = new SystemEvent();
        $systemEvent->user_id = !is_null(Yii::$app->user->id) ? Yii::$app->user->id : 1;
        $systemEvent->date_time = date('Y-m-d H:i:s');
        $systemEvent->module = $data[1]; //$modules[$className];
        $systemEvent->application = $data[0];//$districts[$this->module];

        return $systemEvent;
    }

    //получим имя приложения и модуля, к которому относится объект при ActiveRecord
    public static function getModuleApplication($className):array{
        $apps = Yii::$app->params['applications'];
        $apps = json_decode(Yii::$app->params['main'], true);
        $data = [];
        foreach($apps as $app_name => $app_value){
            foreach ($app_value as $mod_name => $mod_value) {
                if(in_array($className, $mod_value)){

                    $data = [$app_name, $mod_name];
                    break;
                }
            }
        }
        return $data;
    }

    public static function eventAfterInsert($event){

        Yii::debug($event);

        $model = $event->sender;
        $className = self::getClassName($event);

        //получить название модуля и приложения
        $appMod = self::getModuleApplication($className);

        //получить массив со названиями тех объектов, на которые есть подписка
        //сравнить по названиям, и если есть такое, то отправить сообщение
        $s = SystemEventUser::findAll(['user_id' => Yii::$app->user->id]);
        $sendEmail = false;
        foreach($s as $k => $v) {
            if($s[$k]->object_name == $className && $s[$k]->create == 1) {
                $sendEmail = true;
            }
        }

        $objectName = "";

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';

            $systemEvent = self::loadSystemEvent($appMod);
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = $className . ' Created: "' . $objectName . '" by user '.$systemEvent->user_id;
            $systemEvent->sender_id = $model->id;
            $systemEvent->class_name = $className;
            $systemEvent->request_uri = $_SERVER['REQUEST_URI'];
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
        }

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($className, $objectName);
    }

    public static function eventAfterUpdate($event) {
        $model = $event->sender;
        $className = self::getClassName($event);
        //todo: последняя точка остановки
        if($className == "Selling" && in_array("state_id", array_keys($event->changedAttributes))) {
            self::eventAfterCustom($event, "обновлено состояние продажи");
        }

        //получить название модуля и приложения
        $appMod = self::getModuleApplication($className);

        //получить массив со названиями тех объектов, на которые есть подписка
        //сравнить по названиям, и если есть такое, то отправить сообщение
        $s = SystemEventUser::findAll(['user_id' => Yii::$app->user->id]);
        $sendEmail = false;
        foreach($s as $k => $v) {
            if($s[$k]->object_name == $className && $s[$k]->update == 1) {
                $sendEmail = true;
            }
        }

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';

            $systemEvent = self::loadSystemEvent($appMod);
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = $className . ' Updated: "' . $objectName . '" by user '.$systemEvent->user_id;
            $systemEvent->class_name = $className;
            $systemEvent->sender_id = $model->id;
            $systemEvent->request_uri = $_SERVER['REQUEST_URI'];
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
        }

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($className, $objectName);
    }

    public static function eventAfterDelete($event){
        $model = $event->sender;
        $className = self::getClassName($event);

        //получить название модуля и приложения
        $appMod = self::getModuleApplication($className);

        //получить массив со названиями тех объектов, на которые есть подписка
        //сравнить по названиям, и если есть такое, то отправить сообщение
        $s = SystemEventUser::findAll(['user_id' => Yii::$app->user->id]);
        $sendEmail = false;
        foreach($s as $k => $v) {
            if($s[$k]->object_name == $className && $s[$k]->delete == 1) {
                $sendEmail = true;
            }
        }

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';

            $systemEvent = self::loadSystemEvent($appMod);
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = $className . ' Deleted: "' . $objectName . '" by user '.$systemEvent->user_id;
            $systemEvent->class_name = $className;
            $systemEvent->sender_id = $model->id;
            $systemEvent->request_uri = $_SERVER['REQUEST_URI'];
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
        }

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($className, $objectName);
    }

    //Пользовательские подписки, такие как подписка на обновление состояния продажи
    public static function eventAfterCustom($event, string $message){
        $model = $event->sender;
        $className = self::getClassName($event);

        //получить название модуля и приложения
        $appMod = self::getModuleApplication($className);

        //получить массив со названиями тех объектов, на которые есть подписка
        //сравнить по названиям, и если есть такое, то отправить сообщение
        $s = SystemEventUser::findAll(['user_id' => Yii::$app->user->id]);
        $sendEmail = false;
        foreach($s as $k => $v) {
            if($s[$k]->object_name == $className && $s[$k]->custom == 1) {
                $sendEmail = true;
            }
        }

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';

            $systemEvent = self::loadSystemEvent($appMod);
            $systemEvent->data = $message;
            $systemEvent->class_name = $className;
            $systemEvent->request_uri = $_SERVER['REQUEST_URI'];
            $systemEvent->sender_id = $model->id;
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
        }

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($className, $objectName);
    }

    public static function eventAfterLogin(){

        $systemEvent = new SystemEvent();
        $systemEvent->user_id = !is_null(Yii::$app->user->id) ? Yii::$app->user->id : 1;
        $systemEvent->date_time = date('Y-m-d H:i:s');
        $systemEvent->module = "main"; //$modules[$className];
        $systemEvent->application = "main";//$districts[$this->module];
        $systemEvent->data = "Вы авторизовались";
        $systemEvent->class_name = "main";
        if (!$systemEvent->save()) {
            throw new \Exception(json_encode($systemEvent->errors));
        }
    }

}