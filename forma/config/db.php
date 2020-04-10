<?php

define('DB_MODE', 'docker');

if (DB_MODE == 'docker') {
    //DOCKER
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=dbforma;dbname=warehouse',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ];

} elseif (DB_MODE == 'remote') {
    //REMOTE
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=ingello.com;dbname=warehouse;port=3301',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ];
} elseif (DB_MODE == 'custom') {
    //php -S + Docker DB
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=warehouse;port=3300',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ];
} else {
    throw new Exception('Add DB_MODE variable in index.php');
}
