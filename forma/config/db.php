<?php

define('DB_MODE', 'docker');

if (DB_MODE == 'docker') {
    //DOCKER
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=dball;dbname=forma',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ];

} elseif (DB_MODE == 'remote') {
    //REMOTE
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=forma.ingello.com;dbname=forma;port=3306',
        'username' => 'root',
        'password' => 'rootingello82138096',
        'charset' => 'utf8',
        'commandClass' => 'forma\modules\core\records\Command',
    ];
} elseif (DB_MODE == 'custom') {
    //php -S + Docker DB
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=forma;port=3306',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'commandClass' => 'forma\modules\core\records\Command',
    ];
} else {
    throw new Exception('Add DB_MODE variable in index.php');
}
