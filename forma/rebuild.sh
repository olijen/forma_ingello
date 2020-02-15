#!/usr/bin/env bash

sudo mysql -e "drop database if exists warehouse; create database warehouse;" <<< Yes

rm -rf composer-lock.json vendor/* vendor
composer install
./yii migrate <<< Yes
./yii serve --port 0.0.0.0:8101 &

chgrp www-data ./runtime/ & chmod -R g+w ./runtime/
chgrp www-data ./web/uploads & chmod -R g+w ./web/uploads
chgrp www-data ./web/assets/ & chmod -R g+w ./web/assets/
chgrp www-data ./web/images/ & chmod -R g+w ./web/images/
