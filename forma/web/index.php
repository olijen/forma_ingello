<?php

set_time_limit(5);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require(__DIR__ . '/../helpers/functions.php');

// comment out the following two lines when deployed to production

if (isset($_GET['debug'])) {
    setcookie('debug', 1);
}

if (isset($_GET['debugoff'])) {
    setcookie('debug', '', time() - 100);
    unset($_COOKIE['debug']);
}

define('YII_ENV', 'dev');
define('YII_DEBUG', true);

//if (!empty($_COOKIE['debug'])) {
//
//    define('YII_ENV', 'dev');
//    define('YII_DEBUG', true);
//} else {
//    define('YII_ENV', 'prod');
//    define('YII_DEBUG', true);
//}


function de($data, $exit = true)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    if ($exit) {
        exit();
    }
}

// Composer
require(__DIR__ . '/../../vendor/autoload.php');

// Yii
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
Yii::setAlias('forma', '../');
Yii::setAlias('@forma', '../');
(new yii\web\Application($config))->run();
