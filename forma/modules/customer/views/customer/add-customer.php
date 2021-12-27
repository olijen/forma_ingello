<?php
$row = 1;
while (($data = fgetcsv($handle, 1000 )) !== FALSE) {
    $num = count($data);
    if ($row==1){
        $row++;
        continue;
    }
    $str = '';
    $vacancy_id = 87;
    foreach ($data as $k=>$value){
        $str.= '\'' . $value . '\''.',' ;
    }
    $str = substr($str, 0, -1);


    $sql = "INSERT INTO customer (telegram,name,skype,description) VALUES ($str)";
    Yii::$app->db->createCommand($sql)->execute();
    $id = Yii::$app->db->getLastInsertID();
    $entityClass = \forma\modules\customer\records\Customer::className();
    $userId = Yii::$app->user->id;
    $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('".$entityClass."','".$id."','".$userId."')" . ';'. '<br>';
    Yii::$app->db->createCommand($sqlAccessory)->execute();

    $sql = "INSERT INTO selling (customer_id) VALUES ($id)";
    Yii::$app->db->createCommand($sql)->execute();
    $id = Yii::$app->db->getLastInsertID();
    $entityClass = \forma\modules\selling\records\selling\Selling::className();
    $userId = Yii::$app->user->id;
    $sqlAccessory = "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('".$entityClass."','".$id."','".$userId."')" . ';'. '<br>';
    Yii::$app->db->createCommand($sqlAccessory)->execute();
// de($id);
//    echo "INSERT INTO customer (telegram,name,skype,description) VALUES ($str)"  . ';'. '<br>';
//    echo "INSERT INTO selling (customer_id) SELECT id FROM customer ORDER BY id DESC LIMIT 1" . ';'. '<br>';
//    $row++;

//        exit();
}

//echo "INSERT INTO accessory (entity_class,entity_id,user_id) VALUES ('".$entityClass."','".$id."','".$userId."')" . ';'. '<br>';
