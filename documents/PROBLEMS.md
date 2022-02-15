To send mail (team_ingello - name of project) (mb not working)
docker stop team_ingello_mailcatcher_1

Out of memory: Kill process
SWAP: https://www.digitalocean.com/community/tutorials/how-to-add-swap-space-on-ubuntu-16-04

Exception 'yii\db\Exception' with message 'SQLSTATE[HY000] [2002] Connection refused'
Solution: Just try build again!

ERROR: for team_ingello_mailcatcher_1  Cannot start service mailcatcher: failed to update store for object type *libnetwork.endpointCnt: Key not found in
Solution: just restart docker

(137) Script docker-compose up --force-recreate -d handling the docker:start event returned with error code 137
Solution: SWAP (see on top ^)

php_network_getaddresses: getaddrinfo failed: Name or service not known
Solution: иногда помогает docker:build, иногда это знак какой то ошибки в конфигах...

Не создается база данных. Не подключается. Но контейнер есть, а в mysql нет БД.
Решил таким образом: на угад создал контейнеры в разных портах. Парочка заработали =). Так и живём...

Failed to create directory "//runtime": mkdir(): Permission denied
Ошибка по идее уникальна. Суть в том, что не должно быть такого пути //runtime. Ошибка была в неверном basePath

Incorrect string value: