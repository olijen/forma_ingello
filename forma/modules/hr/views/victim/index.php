<?php

use forma\modules\hr\records\victim\Victim;
use kartik\daterange\DateRangePicker;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\models\VictimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пострадавшие';
$this->params['breadcrumbs'][] = $this->title;
$this->params['arrayVictimColor'] = $arrayVictimColor;
?>

<style>
    .kv-editable-link {
        color: white;
    }
</style>

<div class="victim-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить пострадавшего'), ['create'], ['class' => 'btn btn-success btn-all-screen']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid'])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsiveWrap' => false,
        'striped' => false,
        'rowOptions' => function ($model, $key, $index, $grid) {
            $modelFullName = explode(' ', $model->fullname)[0];
            foreach ($this->params['arrayVictimColor'] as $key => $color) {
                if (strlen($modelFullName) >= strlen($key)) {
                    if (stripos($modelFullName, $key) !== false) {
                        return ['style' => 'background-color: ' . $color . '; color: white;'];
                    }
                } else {
                    if (stripos($key, $modelFullName) !== false) {
                        return ['style' => 'background-color: ' . $color . '; color: white;'];
                    }
                }
            }
        },
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{update}',
            ],
            'id',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'fullname',
                'label' => 'ФИО',
                'value' => 'fullname',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' ФИО',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'birthday',
                'label' => 'Дата рождения',
                'vAlign' => 'middle',
                'width' => '210px',
                'format' => ['date', 'php:d.m.Y'],

                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Дата рождения',
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_DATE,
                        'options' => [
                            'convertFormat' => true,
                            'pluginOptions' => [
                                'format' => 'dd.MM.yyyy',
                            ]],
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'attribute' => 'is_child',
                'value' => function ($model) {
                    if (date_diff(new DateTime(), new DateTime($model->birthday))->y >= 18) {
                        return 'нет';
                    } else {
                        return 'да';
                    }
                }
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'place_of_residence',
                'label' => 'Прописка',
                'value' => 'place_of_residence',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Прописка',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'second_residence',
                'label' => 'Прописка 2',
                'value' => 'second_residence',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Прописка 2',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'name_where_to_settle',
                'label' => 'Название размещения',
                'value' => 'name_where_to_settle',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Название размещения',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'settlement_address',
                'label' => 'Адрес размещения',
                'value' => 'settlement_address',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Адрес размещения',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'phone',
                'label' => 'Телефон',
                'value' => 'phone',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Телефон',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'registered_at',
                'vAlign' => 'middle',
                'width' => '210px',
                'filter' => DateRangePicker::widget([
                    'name' => 'date_range_registered_at',
                    'presetDropdown' => true,
                    'pluginOptions'=>[
                        'locale' => [
                            'format' => 'DD.MM.Y'
                        ],
                    ],
                    //todo: абстрагировать
                    'value' => isset($_GET['date_range_registered_at']) ?
                        $_GET['date_range_registered_at'] : Victim::getDateRange(),
                ]),
                'editableOptions' => function ($model, $key, $index) use ($searchModel) {
                    return [
                        'header' => ' Дата регистр.',
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_DATE,
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'stay_for',
                'label' => 'Время пребывания',
                'value' => 'stay_for',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) use ($searchModel) {
                    return [
                        'header' => ' Время пребывания',
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'data' => $searchModel::getStayFor(),
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'questions',
                'label' => 'Особенности',
                'value' => 'questions',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Особенности',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'specialization',
                'label' => 'Специализация',
                'value' => 'specialization',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Специализация',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'destination',
                'label' => 'Куда уедет',
                'value' => 'destination',
                'vAlign' => 'middle',
                'width' => '210px',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'header' => ' Куда уедет',
                        'size' => 'md',
                    ];
                },
                'contentOptions' => ['class' => 'no-load'],
            ],
        ],
    ]); ?>

    <?php Pjax::end();?>


</div>
