<?php

namespace forma\modules\core\records;

use Yii;
use forma\modules\core\records;

class SystemEventUserService {
    public static $models = [];

    public static $blackListOfEvents = [
        'SystemEvent',
        'Accessory',
        'WidgetUser'
    ];

    public static function init(){
        self::$models = self::getModels();
    }

    public static function getModels(){
        $modelTableName = Yii::$app->db
            ->createCommand('SHOW TABlES')
            ->queryAll();

        $models = [];

        foreach($modelTableName as $key => $model) {
            $models[] = self::getModelName($model['Tables_in_forma']);
        }

        return $models;
    }

    public static function getModelName($table_name){
        $table_name = ucfirst($table_name);
        for($i = 0; $i < strlen($table_name); $i++){
            if($table_name[$i] == "_") {
                $table_name[$i+1] = mb_strtoupper($table_name[$i+1]);
            }
        }

        return preg_replace('/_/', "", $table_name);
    }

    //возвращаем массив в котором содержаться список событий с подписками, после этот массив будет отдан в
    //SystemEventUser::load($array)
    public static function saveSubscribes(array $eventList): array{

        $saveList = [];

        foreach($eventList['EventForSubscribe'] as $event => $eventValue) {
            $saveList[$event]['create'] = 0;
            $saveList[$event]['update'] = 0;
            $saveList[$event]['delete'] = 0;
            $saveList[$event]['custom'] = 0;
        }

        foreach ($eventList as $event => $eventValue) {

            foreach ($eventValue as $k => $v) {

                foreach ($v as $cud => $value){
                    switch($cud){
                        case "create":
                            $saveList[$k]['create'] = 1;
                            break;
                        case "update":
                            $saveList[$k]['update'] = 1;
                            break;
                        case "delete":
                            $saveList[$k]['delete'] = 1;
                            break;
                        case "custom":
                            $saveList[$k]['custom'] = 1;
                    }
                }
            }
        }

//        echo "<br /><br /> SAVE LIST </br>"; уточнить причину ошибки.
//        print_r($saveList);

        return $saveList;
    }

    //удаляем старые записи в БД по этому пользователю, перед добавлением новых
    public static function deleteOldSystemEventUser() : void {
        $s = SystemEventUser::findAll(['user_id' => Yii::$app->user->id]);

        foreach ($s as $k => $v) {
            $s[$k]->delete();
        }
    }

    // отправить юзеру письмо что произошло то событие, на которое он подписан
    public static function sendEmailSystemEventUser(string $subject, string $text) : void{
        $user = User::findOne(['id' => Yii::$app->user->id]);
        Yii::$app->mailer->compose()
            ->setFrom('forma@gmail.com')
            ->setTo($user->getEmail())
            ->setSubject($subject)
            ->setTextBody('По вашей подписке произошло событие')
            ->setHtmlBody($text)
            ->send();
    }
}