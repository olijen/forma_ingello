<?php
/**
 * Формирование параметров соединения с базой данный.
 *
 * Исторически сложилось так, что параметры соединения вшиты в код. Для
 * использования параметров соединения из .env файла, установине переменную
 * окружения DB_MODE в значение "env". Для поддержания обраной совместимости,
 * значение по умолчаню "docker"
 *
 */
// TODO: избавиться от фиксированых значений.

require_once(__DIR__ . '/dotenv.php');


switch (getenv("DB_MODE") ?: "docker") {
    case 'docker':
        return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=dball;dbname=forma',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ];

    case 'remote':
        return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=forma.ingello.com;dbname=forma;port=3306',
            'username' => 'root',
            'password' => 'rootingello82138096',
            'charset' => 'utf8',
            'commandClass' => 'forma\modules\core\records\Command',
        ];

    case 'custom':
        return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=forma;port=3306',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'commandClass' => 'forma\modules\core\records\Command',
        ];

    case 'env':
        return [
            'class' => 'yii\db\Connection',
            'dsn' => getenv("DB_DSN") ?: 'mysql:host=dball;dbname=forma',
            'username' => getenv("DB_USERNAME") ?: 'root',
            'password' => getenv("DB_PASSWORD") ?: 'root',
            'charset' => getenv("DB_CHARSET") ?: 'utf8',
            'tablePrefix' => getenv("DB_TABLE_PREFIX") ?: '',
        ];

    default:
        throw new Exception('Set DB_MODE inside .env to one of: docker, remote, custom, env');
}
