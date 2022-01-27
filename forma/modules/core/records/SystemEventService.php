<?php


namespace forma\modules\core\records;


use forma\modules\test\records\TestTypeField;
use forma\modules\test\records\TestTypeFieldSearch;
use forma\modules\core\records\SystemEventUserService;
use forma\modules\test\records\TestTypeSearch;
use forma\modules\test\records\TestType;
use Yii;
use forma\modules\selling\records\selling\Selling;
use function Couchbase\defaultDecoder;

class SystemEventService
{

    public static $models = [];

    public static $blackListOfEvents = [
        'SystemEvent',
        'Accessory',
        'StateSearchState',
        'TestSearch',
        'TestType',
        'TestTypeField',
        'Test',
        'TestTypeFieldSearch',
        'UserIdentity'//при регистрации не учитывать ничего в системных событиях
    ];

    public static function init(){
        self::$models = SystemEventUserService::getModels();
        //Yii::debug(self::$records);
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
    public static function setCookieSystemEvent(string $name,int $rule_id){
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => $name,
            'value' => [$rule_id],
        ]));
    }
    public static function eventAfterInsert($event){

        //Yii::debug($event);

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
        $subject = '';
        $text = '';
        //Yii::debug($className);

        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? null;

            $rule = Rule::find()->andWhere(['action' => 'insert'])->andWhere(['table' => $model->tableName()])->one();

            if($rule){
                $accessInterface = AccessInterface::find()->andWhere(['user_id' => Yii::$app->user->identity->id])->andWhere(
                    ['rule_id' => $rule->id]
                )->one();
                if ($accessInterface === null) {
                    $newAccessInterface = new AccessInterface();
                    $newAccessInterface->rule_id = $rule->id;
                    $newAccessInterface->current_mark = 1;
                    $newAccessInterface->user_id = Yii::$app->user->identity->id;
                    $newAccessInterface->status = false;
                    $newAccessInterface->save();
                } else {
                    if ($accessInterface->status == false) {
                        $accessInterface->status = false;
                        $accessInterface->current_mark = ++$accessInterface->current_mark;
                        $accessInterface->save();
                    }
                    if($accessInterface->current_mark == $rule->count_action){
                        $accessInterface->status = 1;
                        $accessInterface->save();
                        self::setCookieSystemEvent('event',$rule->id);
                    }
                }
            }

            $systemEvent = self::loadSystemEvent($appMod);
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = Yii::$app->params['translate'][$className] . ' Создан: ' . (!is_null($objectName) ? '"'.$objectName.'"' : '') . ' пользователем '.$systemEvent->user->username;
            $systemEvent->sender_id = $model->id;
            $systemEvent->class_name = $className;
            $systemEvent->request_uri = $_SERVER['REQUEST_URI'];
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
            $arr = explode("/", $systemEvent->request_uri);
            //Yii::debug("ebanina");
           // Yii::debug($arr);
            if(isset($arr[1]) && ($arr[1]=='selling' || $arr[1]=='inventorization') && ($arr[2] == 'form' || $arr[2] == 'talk')) $arr[2] = 'main';
          //  Yii::debug($arr);
            $subject = 'Forma: в отделе '.$systemEvent->application.' был добавлен объект: ('. $systemEvent->class_name .') '
                . $objectName;
            $text = 'FORMA INGELLO: В отделе: '.$systemEvent->application.' добавлен объект: ('. $systemEvent->class_name .') '
                . $objectName .' <br /> Посмотреть список <a href="http://' . $_SERVER['HTTP_HOST']. '/' .$arr[1].'/'.$arr[2].'">Перейти</a>' .
                '<br /> Посмотреть объект <a href="http://'.$_SERVER['HTTP_HOST'] . '/' . $arr[1] . '/' . $arr[2] .'/update?id='.$systemEvent->sender_id.'">Перейти</a>';
        }

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($subject, $text);
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
        $subject = '';
        $text = '';
        if(self::checkBlackList($className)) {
//            var_dump('11');
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? null;
            $rule = Rule::find()->andWhere(['action' => 'update'])->andWhere(['table' => $model->tableName()])->one();
            if($rule){
                $accessInterface = AccessInterface::find()->andWhere(['user_id' => Yii::$app->user->identity->id])->andWhere(
                    ['rule_id' => $rule->id]
                )->one();
                if ($accessInterface === null) {
                    $newAccessInterface = new AccessInterface();
                    $newAccessInterface->rule_id = $rule->id;
                    $newAccessInterface->current_mark = 1;
                    $newAccessInterface->user_id = Yii::$app->user->identity->id;
                    $newAccessInterface->status = false;
                    $newAccessInterface->save();
                } else {
                    if ($accessInterface->status == false) {
                        $accessInterface->status = false;
                        $accessInterface->current_mark = ++$accessInterface->current_mark;
                        $accessInterface->save();
                    }
                    if($accessInterface->current_mark == $rule->count_action){
                        $accessInterface->status =1;
                        $accessInterface->save();
                        self::setCookieSystemEvent('event',$rule->id);
                    }
                }
            }

            $systemEvent = self::loadSystemEvent($appMod);
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = Yii::$app->params['translate'][$className] . ' Обновлен: ' . (!is_null($objectName) ? '"'.$objectName.'"' : '') . ' пользователем '.$systemEvent->user->username;
            $systemEvent->class_name = $className;
            $systemEvent->sender_id = $model->id;
            $systemEvent->request_uri = $_SERVER['REQUEST_URI'];
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
            $arr = explode("/", $systemEvent->request_uri);
            $subject = 'Forma: в отделе '.$systemEvent->application.' был обновлен объект: ('. $systemEvent->class_name .') '
                . $objectName;
            $text = 'FORMA INGELLO: В отделе: '.$systemEvent->application.' обновлен объект: ('. $systemEvent->class_name .') '
                . $objectName .' <br /> Посмотреть список <a href="http://' . $_SERVER['HTTP_HOST']. '/' .$arr[1].'/'.$arr[2].'">Перейти</a>' .
            '<br /> Посмотреть объект <a href="http://'.$_SERVER['HTTP_HOST'] . '/' . $arr[1] . '/' . $arr[2] .'/update?id='.$systemEvent->sender_id.'">Перейти</a>';
        }

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($subject, $text);
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
        $subject = "";
        $text = "";
        if(self::checkBlackList($className)) {
            $objectName = $model->name ?? $model->title ?? $model->product->name ?? null;
            $rule = Rule::find()->andWhere(['action' => 'delete'])->andWhere(['table' => $model->tableName()])->one();
            if($rule){
                $accessInterface = AccessInterface::find()->andWhere(['user_id' => Yii::$app->user->identity->id])->andWhere(
                    ['rule_id' => $rule->id]
                )->one();
                if (!$accessInterface) {
                    $newAccessInterface = new AccessInterface();
                    $newAccessInterface->rule_id = $rule->id;
                    $newAccessInterface->current_mark = 1;
                    $newAccessInterface->user_id = Yii::$app->user->identity->id;
                    $newAccessInterface->status = false;
                    $newAccessInterface->save();
                } else {
                    if ($accessInterface->status == false) {
                        $accessInterface->status = false;
                        $accessInterface->current_mark = ++$accessInterface->current_mark;
                        $accessInterface->save();
                    }
                    if($accessInterface->current_mark == $rule->count_action){
                        $accessInterface->status =1;
                        $accessInterface->save();
                        self::setCookieSystemEvent('event',$rule->id);
                    }
                }
            }

            $systemEvent = self::loadSystemEvent($appMod);
            //Yii::debug($systemEvent . '----- user');
            $systemEvent->data = Yii::$app->params['translate'][$className] . ' Удален: ' . (!is_null($objectName) ? '"'.$objectName.'"' : '') . ' пользователем '.$systemEvent->user->username;
            $systemEvent->class_name = $className;
            $systemEvent->sender_id = $model->id;
            $systemEvent->request_uri = $_SERVER['REQUEST_URI'];
            $systemEvent1 = clone $systemEvent;
            if (!$systemEvent->save()) {
                throw new \Exception(json_encode($systemEvent->errors));
            }
            $arr = explode("/", $systemEvent->request_uri);
            $subject = 'Forma: из отдела '.$systemEvent->application.' удален объект: ('. $systemEvent->class_name .') '
                . $objectName;
            $text = 'FORMA INGELLO: В отделе: '.$systemEvent->application.' удален объект: ('. $systemEvent->class_name .') '
                . $objectName .' <br /> Посмотреть список <a href="' . $_SERVER['HTTP_HOST']. '/' .$arr[1].'/'.$arr[2].'">Перейти</a>';
        }



        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($subject, $text);
        //if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($className, $objectName);
    }

    //Пользовательские подписки, такие как подписка на обновление состояния продажи
    public static function eventAfterCustom($event, string $message){
        $model = $event->sender;
        $objectName = $model->name ?? $model->title ?? $model->product->name ?? '';
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

        $subject = 'Forma: обновлено состояние продажи';
        $text = 'FORMA INGELLO: обновлен статус продажи: '.$_SERVER['HTTP_HOST'].'/selling/form?id='.$model->id;

        if($sendEmail) SystemEventUserService::sendEmailSystemEventUser($subject, $text);
    }

    public static function eventAfterLogin($event){

        $systemEvent = new SystemEvent();
        $systemEvent->user_id = !is_null(Yii::$app->user->id) ? Yii::$app->user->id : 1;
        $systemEvent->date_time = date('Y-m-d H:i:s');
        $systemEvent->module = "Ядро"; //$modules[$className];
        $systemEvent->application = "BOSS";//$districts[$this->module];
        $systemEvent->data = "Вы авторизовались";
        $systemEvent->class_name = "Login";
        $systemEvent->request_uri = $_SERVER['REQUEST_URI'].'/zaglushka';
        $systemEvent->sender_id = 1;
        if (!$systemEvent->save()) {
            var_dump(($systemEvent->errors));
            exit;
        }
    }

}