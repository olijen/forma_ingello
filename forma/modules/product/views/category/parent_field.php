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

//var_dump($searchParentField);
//de($parentFieldDataProvider->getModels());
?>


    <?php
    echo 'Характеристики родительской категории';
    echo GridView::widget([
        'dataProvider' => $parentFieldDataProvider,
        'filterModel' => $searchParentField,
        'columns' => [
//            ['class' => 'yii\grid\ActionColumn',
//                'template' => '{delete}',
//                'controller' => 'field',
//            ],
            'name',
            'widget',
            'defaulted',
            [
                'attribute' => 'fieldValues.name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::activeDropDownList(new FieldValue, 'name',
                        ArrayHelper::map(FieldValue::find()
                            ->where(['field_id' => $model->id])
                            ->all(), 'id', 'name'));

                },
                 'filter' =>  Html::activeDropDownList(new FieldValue, 'name',
                     ArrayHelper::map(FieldValue::find()->all(), 'id', 'name'),
                     ['class'=>'form-control','prompt' => 'Select Category'] ),
            ],
        ],
    ]);
    ?>

