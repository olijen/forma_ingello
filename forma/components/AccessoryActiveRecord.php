<?php

namespace forma\components;

use forma\modules\core\records\User;
use ReflectionClass;
use yii\db\ActiveRecord;
use forma\modules\core\records\Accessory;
use Yii;

class AccessoryActiveRecord extends ActiveRecord
{
    public function access($query)
    {
        $user = \Yii::$app->getUser()->getIdentity();
        $ids = []; //$ids - это массив типа [1,2,3,4,5...]
        $condition = '';

        if ($user->parent_id != null) {
            // Выбирает себя, реферера (начальника) и всех его рефералов (сотрудников)
            $condition = "parent_id = {$user->parent_id} OR id = {$user->parent_id} or id = {$user->id}";
        } else {
            // Выбирает себя (начальника, реферера) и всех рефералов.
            $condition = "parent_id = {$user->id} OR id = {$user->id}";
        }

        foreach (User::find()->where($condition)->all() as $user) {
            array_push($ids, $user->id);
        }

        $results = Accessory::find()
            ->andWhere([ 'in', 'accessory.user_id', $ids])
            ->andWhere([ 'accessory.entity_class' => explode('Search!!!', static::class.'!!!')[0] ])
            ->all();

        $accessedIds = [];
        foreach ($results as $result) {
            $accessedIds[]=$result->entity_id;
        }

        $searchClass = static::class;
        $searchClass = new $searchClass;
        $name = (new ReflectionClass($searchClass))->getShortName();
        $name = explode('Search!!!', $name.'!!!')[0];
        $query->andFilterWhere(['in', strtolower($name).'.id', $accessedIds]);
    }
// todo: немного подругому описать токен, не пустой, не тот который есть в БД
    public function afterSave($insert, $changedAttributes)
    {
        if (empty(Accessory::find()->where([
            'entity_class' => get_class($this),
            'entity_id' => $this->id,
            'user_id' => Yii::$app->getUser()->id,
        ])->one()) && !isset($_GET['selling_token'])) {
            $this->createAccessoryToUser();
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function getAccessory()
    {
        return $this->hasOne(Accessory::className(), ['entity_id' => 'id']);
    }

    protected function createAccessoryToUser()
    {
        $accessory = new Accessory();

        $accessory->entity_class = get_class($this);
        $accessory->entity_id = $this->id;

        $accessory->user_id = Yii::$app->getUser()
            ->getIdentity()
            ->getId();

        $accessory->save();
    }

    public static function accessSearchDataProvider($default = [], $force = false)
    {
        $searchClass = static::class.'Search';
        $searchClass = new $searchClass;
        $name = (new ReflectionClass($searchClass))->getShortName();

        $dataProvider = $searchClass->search(
            (!empty($_REQUEST[$name]) && !$force)
                ? $_REQUEST
                : [$name => $default]
        );

        return $dataProvider;
    }

    public static function accessSearch($default = [], $pagination = false)
    {
        $dataProvider =  self::accessSearchDataProvider($default);

        if ($pagination) {
            $dataProvider->pagination->defaultPageSize = $pagination['defaultPageSize']??null;
            $dataProvider->pagination->setPage($pagination['setPage']??null);
            $dataProvider->pagination->setPageSize($pagination['setPageSize']??null);
        } else {
            $dataProvider->pagination = false;
        }
        return $dataProvider;
    }

    public static function getAccessToOne($default = [])
    {
        return self::accessSearchDataProvider($default)->getModels()[0];
    }

    public static function forceAccessToOne($default = [])
    {
        return self::accessSearchDataProvider($default, true)->getModels()[0];
    }
}
