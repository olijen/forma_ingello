Работа с докером:

Рестарт докера
sudo service docker restart

Очистить образы докера
sudo docker ps -aq
sudo docker rm $(docker ps -aq) -f
sudo rm /var/lib/docker/network/files/local-kv.db

Получить развёрнутую информацию об контейнерах

#IP of all running containers
docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)

#Удалит все неиспользуемые контейнеры а также образы.
docker system prune -a

Запустить докер после перезагрузки компа
docker-compose up -d

Bash
docker-compose exec app bash

---------------------- BASH ---------------------

unpack vendor
docker-compose exec app rm -rf vendor/* & unzip vendor.zip -d ./ & chmod -R 777 vendor/*

cant create\read assets (or other)
docker-compose exec -T app chmod -R 777 ./*

---------------------- DATABASE -----------------

Загрузить дамп
docker-compose exec -T dblinoleum mysql -u root -proot linoleum < data/data.sql
(лучшек использовать способ через папку mysql/socker/scripts - положить туда нужные sql файлы)

Migrations
docker-compose exec app console/yii migrate

MySQL is available on localhost (.env), port 3306. User - root, password - root

Dump only data
mysqldump -u ysk_dbu -h 172.18.0.3 yii2-starter-kit --no-create-info -pysk_pass > data.sql

Dump all from remote server
mysqldump -u root -h ecocom.ingello.com ecocom -proot --port=3300 > data.sql

Дамп данных из контейнера dblinoleum (для примера)
docker-compose exec -T dblinoleum mysqldump -u root -h localhost linoleum -proot > data.sql

Импорт данных из контейнера dbapplan (для примера)
docker-compose exec -T dbapplan mysql -u root -proot eva < eva.sql
docker-compose exec -T dbapplan mysqlimport -u root -p eva eva.sql
Можно положить файлы дампов в соответствующую папку в docker

Вытащить все переводы translates
yii message/extract