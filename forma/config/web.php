<?php

use yii\db\ActiveRecord;
use yii\web\AssetBundle;
use forma\modules\core\records\SystemEventService;

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$modules = require(__DIR__ . '/modules.php');

//Yii::setAlias('@bower', dirname(dirname(__DIR__)) . '/vendor' . DIRECTORY_SEPARATOR . 'bower/bower-asset');

$config = [
    'id' => 'warehouse',
    'name' => 'FORMA.INGELLO',
    'basePath' => __DIR__.'/../',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log'],
    'modules' => $modules,
    'layoutPath' => '@forma/modules/core/views/layouts',
    'defaultRoute' => 'core',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'on beforeAction' => function($event) {

        yii\base\Event::on(ActiveRecord::class, ActiveRecord::EVENT_AFTER_INSERT, function ($event) {
            SystemEventService::init();
            SystemEventService::eventAfterInsert($event);

        });


        yii\base\Event::on(ActiveRecord::class, ActiveRecord::EVENT_AFTER_UPDATE, function ($event) {

            SystemEventService::eventAfterUpdate($event);

        });

        yii\base\Event::on(ActiveRecord::class, ActiveRecord::EVENT_AFTER_DELETE, function ($event) {

            SystemEventService::eventAfterDelete($event);

        });

    },
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'e003MQ-QvRSydQdwqp6GROv-QdqLDt3m',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'forma\modules\core\components\UserIdentity',
            'enableAutoLogin' => true,
            'loginUrl' => ['/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'core/site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'tyzhukotinskiy@gmail.com',
                'password' => 'qazwsxedckzs1',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login' => 'core/site/login',
                'logout' => 'core/site/logout',
                'signup' => 'core/site/signup',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-green-light',
                ],

                'insolita\wgadminlte\JsCookieAsset'=>[
                    'depends'=>[
                        'yii\web\YiiAsset',
                        'forma\assets\AppAsset',
                    ]
                ],
                'insolita\wgadminlte\CollapseBoxAsset'=>[
                    'depends'=>[
                        'insolita\wgadminlte\JsCookieAsset'
                    ]
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'Europe/Kiev',
            'timeZone' => 'Europe/Kiev',
        ],
    ],
    'params' => $params,

    'language'=>'ru',
    'sourceLanguage'=>'ru',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'tcrud' => ['class' => '\wokster\ltewidgets\generators\tcrud\Generator'],
            'tmodel' => ['class' => '\wokster\ltewidgets\generators\tmodel\Generator'],
        ],
    ];
}

return $config;
