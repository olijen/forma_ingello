<?php


namespace forma\modules\product\services;


use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\Field;
use forma\modules\product\records\FieldProductValue;
use forma\modules\product\records\FieldValue;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class FieldValueService
{
    public static function get($id = null)
    {
        if (!$id) {
            return self::create();
        }
        return FieldValue::findOne($id);
    }

    public static function create()
    {
        return new FieldValue();
    }

    public static function mayBeSave($post, $fieldModel)
    {
        $fieldId = $post['Field']['id'];
        if (SystemWidget::manyValuesWidgets($post['Field']['widget'])) {

            if (isset($post['FieldValueNew'])) {
                self::eachFieldValueForCreate($post['FieldValueNew'], $fieldId, $post);
            }
            if (SystemWidget::manyValuesWidgets($fieldModel->widget)) {

                if (isset($post['FieldValue'])) {
                    self::eachFieldValueForUpdate($post['FieldValueNew'], $post);
                }
            }
        }
    }

    public static function eachFieldValueForUpdate($eachFieldValue, $post)
    {
        foreach ($eachFieldValue as $fieldValueId => $fieldValue) {

            if (!empty($fieldValue['name'])) {
                if (isset($post['FieldValueRadioButton']) && $post['FieldValueRadioButton'] == $fieldValueId) {
                    self::save($fieldValueId, $fieldValue, true);
                } else {
                    self::save($fieldValueId, $fieldValue, false);
                }
            } else {
                FieldValue::deleteAll('id = ' . (int)$fieldValueId);
            }
        }
    }

    public static function eachFieldValueForCreate($eachFieldValue, $fieldId, $post)
    {
        foreach ($eachFieldValue as $key => $fieldValue) {
            if (!empty($fieldValue['name'])) {
                if (isset($post['FieldValueRadioButton']) && $post['FieldValueRadioButton'] == $key) {  // мы присваеваем отмеченому радио (значение) идентификатор текущего поля
                    self::save(null, $fieldValue, true, $fieldId);
                } else {
                    self::save(null, $fieldValue, false, $fieldId);
                }
            }
        }
    }

    public static function save($id, $fieldValue, $isMainRadio = false, $fieldId = null)
    {
        $model = self::get($id);
        if (!is_null($fieldId)) {   //при создании новой модели нужно присвоить field id , при изменении - не нужно
            $model->field_id = $fieldId;
        }
        $model->name = $fieldValue['name'];

        if ($isMainRadio) { // Для радио баттона
            $model->is_main = 1;
        } else {
            $model->is_main = 0;
        }
        if (isset($fieldValue['is_main']) && $fieldValue['is_main'] == 1) { // для чекбокса
            $model->is_main = '1';
        }

        if (!$model->validate()) {
            $model->errors;
            var_dump($model->errors);
            die();
        }

        $model->save();
        return $model;
    }

    public static function getFieldValue()
    {
        return FieldValue::find()->all();
    }

    public static function getFieldValuesNameFilterArray($currentCategoryId)
    {
        return ArrayHelper::map(FieldValue::find()
            ->joinWith('field')
            ->andWhere(['field.category_id' => $currentCategoryId])
            ->all(), 'id', 'name');
    }

}