<?php

namespace forma\modules\product\services;

use forma\modules\product\records\Field;

class FieldService
{
    public static function get($id = null)
    {
        if (!$id) {
            return self::create();
        }
        return Field::findOne($id);
    }

    public static function create()
    {
        return new Field();
    }

    public static function save($id, $post)
    {

        $model = self::get($id);

        $model->load($post);

        $model->load(['color_id' => self::getColorByPost($post)], '');
        $model->sku = 'VSKR-50';
        $model->volume = '50';
        $model->country_id = '6';

        //todo: нормально обработать ошибку
        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }

//        $packUnits = $post['Product']['packUnits'];
//        if (!is_array($post['Product']['packUnits'])) {
//            return $model;
//        }
//
//        ProductPackUnit::deleteAll(['product_id' => $model->id]);
//        foreach ($packUnits as $packUnitId) {
//            PackUnitService::save($model->id, $packUnitId);
//        }

        return $model;
    }
}