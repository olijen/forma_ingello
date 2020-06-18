<?php

use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

$currentCategory = '';
if (!isset($thisParentGrid)) {
    $actionColumn = [
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{delete}{update}',
            'controller' => 'field',
        ],
    ];
    if (isset($model)) {
        $currentCategory = $model->id;
    }
} elseif (isset($thisParentGrid)) {
    echo 'Характеристики родительской категории';
    if (isset($dataProvider->getModels()[0])) {
        $currentCategory = $dataProvider->getModels()[0]->category_id;
    }
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
        'value' => function ($model) {
            $fieldValueArray = ArrayHelper::map(FieldValue::find()
                ->where(['field_id' => $model->id])
                ->all(), 'id', 'name');

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
                ->andWhere(['field.category_id' => $currentCategory])
                ->all(), 'id', 'name'),
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

