<?php

set_time_limit(5);

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

// Composer
require(__DIR__ . '/../../vendor/autoload.php');

// Yii
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
Yii::setAlias('forma', '../');
Yii::setAlias('@forma', '../');
(new yii\web\Application($config))->run();
