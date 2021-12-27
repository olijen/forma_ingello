<?php

$row = 1;
while (($data = fgetcsv($handle, 1000)) !== FALSE) {
    $num = count($data);
    if ($row == 1) {
        $row++;
        continue;
    }
    $str = '';
    $vacancy_id = 86;
    foreach ($data as $k => $value) {
        $str .= '\'' . $value . '\'' . ',';
    }
//        $str.='\'' . $vacancy_id . '\''.',' ;
    $str = substr($str, 0, -1);
    $sql = "INSERT INTO worker (patronymic,surname,passport,experience_description) VALUES ($str)";
    $addWorker = Yii::$app->db->createCommand($sql)->execute();
    $id = Yii::$app->db->getLastInsertID();
    $entityClass = \forma\modules\worker\records\Worker::className();
    $userId = Yii::$app->user->id;
    $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('" . $entityClass . "','" . $id . "','" . $userId . "')" . ';' . '<br>';
    $addAccessory = Yii::$app->db->createCommand($sqlAccessory)->execute();

    $sql = "INSERT INTO worker_vacancy (worker_id,vacancy_id) VALUES ($id,$vacancy_id)";
    $addWorkerVacancy = Yii::$app->db->createCommand($sql)->execute();
    $id = Yii::$app->db->getLastInsertID();
    $entityClass = \forma\modules\worker\records\Worker::className()::className();
    $userId = Yii::$app->user->id;
    $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('" . $entityClass . "','" . $id . "','" . $userId . "')" . ';' . '<br>';
    $addAccessoryWorkerVacancy = Yii::$app->db->createCommand($sqlAccessory)->execute();


//    $sql = "INSERT INTO customer (patronymic,surname,passport,experience_description) VALUES ($str)";
//    Yii::$app->db->createCommand($sql)->execute();
//    $id = Yii::$app->db->getLastInsertID();
//    $entityClass = \forma\modules\customer\records\Customer::className();
//    $userId = Yii::$app->user->id;
//    $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('".$entityClass."','".$id."','".$userId."')" . ';'. '<br>';
//    Yii::$app->db->createCommand($sqlAccessory)->execute();
//        echo $str;
//        echo ($str) .',';
//    echo "INSERT INTO worker (patronymic,surname,passport,experience_description) VALUES ($str)"  . ';'. '<br>';
//    echo "INSERT INTO worker_vacancy (worker_id) SELECT id FROM worker ORDER BY id DESC LIMIT 1" . ';'. '<br>';
//    echo "UPDATE worker_vacancy SET vacancy_id = '87' WHERE worker_id =(SELECT id FROM worker ORDER BY id DESC LIMIT 1 ) ". ';'. '<br>';
////        exit();
//    $row++;
//        exit();
}