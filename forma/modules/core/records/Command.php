<?php


namespace forma\modules\core\records;


use Yii;
use yii\db\DataReader;
use yii\db\Exception;

class Command extends \yii\db\Command
{
    protected function queryInternal($method, $fetchMode = null)
    {
        list($profile, $rawSql) = $this->logQuery('yii\db\Command::query');

        if ($method !== '') {
            $info = $this->db->getQueryCacheInfo($this->queryCacheDuration, $this->queryCacheDependency);
            if (is_array($info)) {
                /* @var $cache \yii\caching\CacheInterface */
                $cache = $info[0];
                $cacheKey = $this->getCacheKey($method, $fetchMode, '');
                $result = $cache->get($cacheKey);
                if (is_array($result) && isset($result[0])) {
                    //Yii::debug('Query result served from cache', 'yii\db\Command::query');
                    return $result[0];
                }
            }
        }

        $this->prepare(true);

        ///////
//        if ($this->emulateExecution) {
//            return [];
//        }
//        if ($db === null) {
//            $db = Yii::$app->getDb();
//        }
//        list($sql, $params) = $db->getQueryBuilder()->build($this);
//        Yii::debug($sql);
//        Yii::debug($params);
//
//        if (empty(Yii::$app->params['globalQueries'][$sql])) {
//            Yii::debug('in empty');
//            Yii::$app->params['globalQueries'][$sql]['key' . implode($params)] = $this->createCommand($db)->queryAll();
//            Yii::debug(Yii::$app->params['globalQueries'][$sql]['key' . implode($params)]);
//        }
//        if (!empty(Yii::$app->params['globalQueries'][$sql])
//            && (
//            empty(Yii::$app->params['globalQueries'][$sql]['key' . implode($params)])
//            )
//        ) {
//            Yii::debug('in not false');
//            Yii::$app->params['globalQueries'][$sql]['key' . implode($params)] = $this->createCommand($db)->queryAll();
//        }
//
//        Yii::debug($params);
//
//        return $this->populate(Yii::$app->params['globalQueries'][$sql]['key' . implode($params)]);
//        ///
        ///
        ///

        if (isset(Yii::$app->params['globalQueries'][$rawSql]) && Yii::$app->params['globalQueries'][$rawSql] === false)
            return false;
        if (!empty(Yii::$app->params['globalQueries'][$rawSql]))
            return Yii::$app->params['globalQueries'][$rawSql];

        try {
            $profile and Yii::beginProfile($rawSql, 'yii\db\Command::query');

            $this->internalExecute($rawSql);

            if ($method === '') {
                $result = new DataReader($this);
            } else {
                if ($fetchMode === null) {
                    $fetchMode = $this->fetchMode;
                }
                $result = call_user_func_array([$this->pdoStatement, $method], (array) $fetchMode);
                $this->pdoStatement->closeCursor();
            }

            $profile and Yii::endProfile($rawSql, 'yii\db\Command::query');
        } catch (Exception $e) {
            $profile and Yii::endProfile($rawSql, 'yii\db\Command::query');
            throw $e;
        }

        if (isset($cache, $cacheKey, $info)) {
            $cache->set($cacheKey, [$result], $info[1], $info[2]);
            Yii::debug('Saved query result in cache', 'yii\db\Command::query');
        }

       // Yii::debug('Bumbo');
       // Yii::debug($rawSql);
        //Yii::debug($result);

        return Yii::$app->params['globalQueries'][$rawSql] = $result;
    }
}