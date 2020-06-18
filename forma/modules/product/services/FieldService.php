<?php

namespace forma\modules\product\services;

use forma\modules\product\records\Field;
use forma\modules\product\records\FieldProductValue;
use forma\modules\product\records\FieldValue;

/**
 * @property string $widget
 * @property string $name
 * @property string $is_main
 */
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

    public static function updateField($post)
    {
        $postField = $post['Field'];
        $fieldId = $postField['id'];
        $fieldModel = Field::findOne($fieldId);
        if (!isset($post['FieldValueNew']) && !isset($post['FieldValue'])) {
            FieldValue::deleteAll('field_id = ' . (int)$fieldId);
            FieldProductValue::deleteAll('field_id = ' . (int)$fieldId);
            $fieldModel->widget = $postField['widget'];
            $fieldModel->name = $postField['name'];
            $fieldModel->defaulted = $postField['defaulted'];
            if (!$fieldModel->validate()) {
                $fieldModel->errors;
                var_dump($fieldModel->errors);
                die();
            }
            $fieldModel->save();
        } else {
            $fieldModel->defaulted = null;
            $fieldModel->widget = $postField['widget'];
            $fieldModel->name = $postField['name'];
            $fieldModel->save();
        }
        return $fieldModel;
    }

    public static function save($id, $fieldValue, $is_main)
    {

        $model = self::get($id);


        return $model;
    }
}