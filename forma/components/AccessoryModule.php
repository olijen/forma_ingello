<?php

namespace forma\components;

use forma\modules\core\records\Accessory;

class AccessoryModule
{
    /**
     * Метод принимает имя класса в формате '/forma/.../{Rank,Rule,ItemInterface,.....}'
     * Возвращает ключи указанной модели, из таблицы Accessory
     **/
    public static function getAccessoryIdS($classModel)
    {
        $searchClass = $classModel;
        $name = (new \ReflectionClass($searchClass))->getShortName();
        $nameMoreVariant = preg_split("/(?<=[a-z])(?![a-z])/", "$name", -1, PREG_SPLIT_NO_EMPTY);

        $multiNameEntity = "";
        foreach ($nameMoreVariant as $item) {
            $multiNameEntity .= $item;
        }

        $currentNameEntity = $multiNameEntity;
        $access = Accessory::find()->where(['user_id' => \Yii::$app->user->id])
            ->andWhere(['like', 'entity_class', [$currentNameEntity]])->select('entity_id')
            ->all();

        $idS = [];
        foreach ($access as $key => $item) {
            $idS[] = $item->entity_id;
        }

        return $idS;
    }

}