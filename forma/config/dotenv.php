<?php
/**
 * Инициализация переменных окружения.
 *
 * Данный файл стоит загружать перед формированием любых массивов с
 * конфигурацией.
 *
 * После включения данного файла в код, для получения любой переменной
 * окружения(в частности, переменных определенных в .env), используйте
 * `getenv("ENV_NAME")`. Если переменная зарегистрирована, вернется ее
 * значение в виде строки. Если нет - `false`::
 *
 *     dump(getenv("YII_ENV")); # "dev"
 *     dump(getenv("FAKE_NAME")); # false
 *
 * Чтобы получить массив со всеми доступными переменными окружения, вызовите
 * `getenv()` без аргументов::
 *
 *     dump(getenv());
 *
 * В случае необходимости использовать файл отличный от .env(например,
 * .env.test), необходимо установить переменную окружения YII_DOTFILE с именем
 * желаемого файла окружения::
 *
 *     forma/yii serve # запуск сервера с данными из .env
 *     YII_DOTFILE=.env.local forma/yii serve # запуск сервера с данными из .env.local
 *
 */

use Dotenv\Dotenv;

/**
 * Загрузка конфигурации из .env файла. Dotenv::safeLoad используется во
 * избежание исключений, если файла .env нет.
 */
$dotenv = new Dotenv(__DIR__ . "/../..", getenv("YII_DOTFILE") ?: ".env");
$dotenv->safeLoad();