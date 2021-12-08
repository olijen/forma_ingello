<?php

namespace forma\components;

use forma\modules\core\records\User;
use forma\modules\project\records\project\Project;
use yii\helpers\ArrayHelper;
use Yii;

class EntityLister
{
    public static function getList($entityClass, $flag = null)
    {

        $user = \Yii::$app->getUser()->getIdentity();
        $ids = []; //$ids - это массив типа [1,2,3,4,5...]
        $condition = '';
        if ($user !== null) {
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
        }

        $query = $entityClass::find()->joinWith(['accessory'])
            ->andWhere(['in', 'accessory.user_id', Yii::$app->user->id])
            ->andWhere(['accessory.entity_class' => $entityClass::className()]);

        if ($flag) return $query->all();

        return ArrayHelper::map($query->all(), 'id', 'name');
    }

    public static function getListQuery($entityClass, $flag = null)
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

        $query = $entityClass::find()->joinWith(['accessory'])
            ->andWhere(['in', 'accessory.user_id', $ids])
            ->andWhere(['accessory.entity_class' => $entityClass::className()]);

        if ($flag) return $query->all();

        return $query;
    }
}
