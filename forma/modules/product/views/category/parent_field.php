<?php

use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $parentFieldDataProvider - дата провайдер родительской категории */
/* @var $searchParentField - FieldSearch родительской категории */

?>


<?php


echo GridView::widget([
    'dataProvider' => $parentFieldDataProvider,
    'filterModel' => $searchParentField,
    'columns' => [
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

                return (!empty($fieldValueArray)) ?  $fieldValueDropDownList : null;
            },
            'filter' => Html::activeDropDownList(new \forma\modules\product\records\FieldValueSearch(), 'name',
                ArrayHelper::map(FieldValue::find()
                    ->joinWith('field')
                    ->all(), 'id', 'name'),
                ['class' => 'form-control', 'prompt' => '']),
        ],
        'defaulted',
    ],
]);
?>

