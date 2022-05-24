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

        $query = $entityClass::find()->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => Yii::$app->user->id])
            ->andWhere(['accessory.entity_class' => $entityClass::className()]);

        if ($flag) return $query->all();

        return ArrayHelper::map($query->all(), 'id', 'name');
    }

    public static function getListQuery($entityClass, $flag = null)
    {

        $user = \Yii::$app->getUser()->getIdentity();

        $query = $entityClass::find()->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => $user->getId()])
            ->andWhere(['accessory.entity_class' => $entityClass::className()]);

        if ($flag) return $query->all();

        return $query;
    }
}
