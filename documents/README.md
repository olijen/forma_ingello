
ВАЖНЫЕ КОМАНДЫ:
##############################################

ЛОКАЛЬНО - Презагружаем конфиги веб сервера и БД, композер, миграции, вебпак
sudo composer run-script docker:localbuild

ПО SSH - Презагружаем конфиги веб сервера и БД, композер, миграции, вебпак
sudo composer run-script docker:build


ЛОКАЛЬНО - Только перезагружаем конфиги веб сервера и БД
sudo composer run-script docker:localstart

SSH - Только перезагружаем конфиги веб сервера и БД
sudo composer run-script docker:start

###############################################

Включить дебаг режим: http://forma.localhost:82/?debug


ЕСТЬ 2 СПОСОБА УСТАНОВИТЬ ПРОЕКТ:


######################################################################################################################################################################


------------ (1) Развёртывание вручную


0. Скачать проект и создать файл `.env` на основе `.env.dist`
1. поднять сервер на бекенд, (`backend/web`, Например встроенный в пхп `php -S localhost:8888`),
2. Создать БД, поменять в `.env` доступы к БД,
3. Поменять `BACKEND_HOST_INFO = ...` на соответствующий маршрут (например `http://localhost:8888`)
4. Запустить `composer install`
5. Запустить миграции в папке `common` - `php yii migrate`

(Желательно так же запустить сервер хранилища файлов в `storage/web` и поменять пункт `STORAGE_HOST_INFO` в `.env`)


------------ (2) развёртывание с DOCKER

0. Установить докер
   (Для Linux Ubuntu 18 - https://www.digitalocean.com/community/tutorials/docker-ubuntu-18-04-1-ru)
   (Для Windows - https://www.youtube.com/watch?v=a5mxBTGfC5k)

1. Скачать проект и создать файл `.env` на основе `.env.dist` (можно без изменений)
2. Установить композер(https://docs.docker.com/compose/install/)
3. Выключить апач и MySQL (точнее, освободить 80 и 3306 порты)
   sudo service apache2 stop; sudo service nginx stop; sudo service mysql stop;


4. Запустить докер
   sudo composer run-script docker:localbuild
   Зайти по адресу, который указан в переменных `..._HOST_INFO` в файле `.env`
   Готово.


######################################################################################################################################################################

Чистый дамп: adminDump в корне проекта
Дамп наполненный данными для админа и последующих тестовых пользователей: cleanFullDump24-12.sql в корне проекта