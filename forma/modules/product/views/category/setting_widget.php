<?php

use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

if (!isset($thisParentGrid)) {
    echo 'Характеристики текущей категории';
    $actionColumn = [
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{delete}{update}',
            'controller' => 'field',
        ],
    ];

}
if (isset($thisParentGrid)) {
    echo 'Характеристики родительской категории';
    $dataProvider = $parentFieldDataProvider;
    $searchModel = $searchParentField;
    $fieldValuesNameFilterArray = $parentFieldValuesNameFilterArray;
}

$columns = [
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
                case 'widgetRangeInput':
                    return "Диапазон";
                    break;
                case 'widgetNumberControl':
                    return "Число";
                    break;
                case 'widgetTouchSpin':
                    return "Каунтер";
                    break;
                case 'widgetSwitchInput':
                    return "Переключатель";
                    break;
                case 'widgetTypeahead':
                    return "Автодополнение";
                    break;
                case 'widgetStarRating':
                    return "Рейтинг";
                    break;

            }
            return $model->widget;
        },
    ],
    [
        'attribute' => 'fieldValues.name',
        'format' => 'raw',
        'value' => function ($model) use ($allFieldValue) {
            if (isset($allFieldValue)) {
                $fieldValues = '';
                foreach ($allFieldValue as $fieldValue) {
                    if ($fieldValue->field_id == $model->id) {
                        if (empty($fieldValues)) {
                            $fieldValues .= $fieldValue->name;
                        } else {
                            $fieldValues .= ' , ' . $fieldValue->name;
                        }
                    }
                }
                if (!empty($fieldValues)) {
                    return $fieldValues;
                }
            }
            return null;
        },
        'filter' => Html::activeDropDownList(new \forma\modules\product\records\FieldValueSearch(), 'name',
            $fieldValuesNameFilterArray,
            ['class' => 'form-control', 'prompt' => ''])
        ,
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
];

if (!isset($thisParentGrid)) {
    $columns = array_merge($actionColumn, $columns);
}

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $columns,
]);

?>

