#!/usr/bin/env bash

echo "RECREATE DATABASE"

sudo mysql -e "drop database if exists warehouse; create database warehouse;" <<< Yes


echo "REBUILD SERVER"

cd /projects/warehouse/

rm -rf vendor/* vendor composer-lock.json

sudo composer self-update
sudo composer install

./yii migrate <<< Yes

cd web
sudo kill $(sudo lsof -t -i:8801)
php -S 0.0.0.0:8801 &
