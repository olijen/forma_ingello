<?php

use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;


//$columns =;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' =>  [
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{delete}{update}',
            'controller' => 'field',
        ],
        'name',
        [
            'attribute' => 'widget',
            'value' => function ($model) {

                switch ($model->widget) {
                    case 'widgetColorInput':
                        return "Цвет";
                        break;
                    case 'widgetDropDownList':
                        return "Выпадающий список";
                        break;
                    case 'widgetDatePicker':
                        return "Дата";
                        break;
                    case 'widgetMultiSelect':
                        return "Мультиселект";
                        break;
                    case 'widgetTextInput' :
                        return "Поле ввода";
                        break;
                    case 'widgetDateTimePicker':
                        return "Дата и время";
                        break;
                    case 'widgetDateRangePicker':
                        return "Промежуток времени";
                        break;
                }
            },

        ],

        [
            'attribute' => 'fieldValues.name',
            'format' => 'raw',
            'value' => function ($model) {
                $fieldValueArray = ArrayHelper::map(FieldValue::find()
                    ->where(['field_id' => $model->id])
                    ->all(), 'id', 'name');
                $fieldValueDropDownList = Html::activeDropDownList(new  \forma\modules\product\records\FieldValueSearch(),
                    'name', $fieldValueArray);

                if (!empty($fieldValueArray)) {
                    $fieldValues = '';
                    foreach ($fieldValueArray as $fieldValue) {
                        if (empty($fieldValues)) {
                            $fieldValues .= $fieldValue;
                        } else {
                            $fieldValues .= ' , ' . $fieldValue;
                        }
                    }
                    return $fieldValues;
                } else {
                    return null;
                }

            },
            'filter' => Html::activeDropDownList(new \forma\modules\product\records\FieldValueSearch(), 'name',
                ArrayHelper::map(FieldValue::find()
                    ->joinWith('field')
                    ->andWhere(['field.category_id' => $model->id])
                    ->all(), 'id', 'name'),
                ['class' => 'form-control', 'prompt' => '']),
        ],
        [
            'attribute' => 'defaulted',
            'format' => 'raw',
            'value' => function ($model) {
                if (!empty($model->fieldValues)) {
                    $defaultedField = '';
                    foreach ($model->fieldValues as $fieldValue) {
                        if ($fieldValue->is_main == 1)
                            if (empty($defaultedField)) {
                                $defaultedField .= $fieldValue->name;
                            } else {
                                $defaultedField .= ' , ' . $fieldValue->name;
                            }
                    }
                    return $defaultedField;
                } else {
                    return $model->defaulted;
                }
            }
        ],
    ],
]);

?>

