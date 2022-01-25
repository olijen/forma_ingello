<?php

use kartik\color\ColorInput;
use kartik\datetime\DateTimePicker;
use kartik\file\FileInput;
use kartik\number\NumberControl;
use kartik\range\RangeInput;
use kartik\rating\StarRating;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use kartik\touchspin\TouchSpin;
use kartik\typeahead\Typeahead;
use yii\bootstrap\Html as htmlBootstrap;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use forma\components\CombinedDataColumn;
use yii\bootstrap\ButtonDropdown;
use yii\web\View;
use forma\modules\product\records\Type;
use forma\modules\product\records\Category;
use forma\modules\product\records\Manufacturer;
use forma\modules\product\records\Color;
use kartik\grid\GridView;
use forma\modules\country\records\Country;
use yii\helpers\Url;
use forma\extensions\kartik\DynaGrid;
use yii\widgets\ActiveForm;


use forma\modules\product\components\SystemWidget;
use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use forma\modules\product\records\Product;
use forma\modules\product\records\PackUnit;
use forma\modules\core\widgets\DetachedBlock;
use kartik\daterange\DateRangePicker;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel forma\modules\product\records\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile('@web/js/plugins/group-operation.plugin.js', ['position' => View::POS_BEGIN]);
$this->registerJsFile('@web/js/common.js', ['position' => View::POS_END]);

$this->title = 'Объекты учета';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

$this->registerJsFile('@web/js/dyna-grid-change-icon.js', ['position' => \yii\web\View::POS_BEGIN]);

?>

<div class="product-index">

    <input id="import-file-input" type="file" style="display: none;">

    <?php $columns = [
        ['class' => 'kartik\grid\CheckboxColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
        ],
        [
            'contentOptions' => ['class' => 'tbdkjd'],
            'attribute' => 'name',
            'format' => 'html',
            'value' => function ($searchModel) {
                return "<p style='width: 300px'>" . $searchModel->name . "</p>";
            }
        ],

        [
            'attribute' => 'category_id',
            'value' => 'category.name',

            'filter' => Category::getList(),
        ],
        [
            'attribute' => 'sku',
            'label' => 'Артикул',
        ],
        [
            'attribute' => 'manufacturer_id',
            'value' => 'manufacturer.name',
            'filter' => Manufacturer::getList(),
        ],
        'rating',
    ];

    if (isset($fieldsList) && isset($allFieldProductValue)) {
        $params = Yii::$app->request->queryParams;
        foreach ($fieldsList as $fieldId => $field) {

            if (isset($params['FieldProductValue'][$fieldId])) {
                $filter = SystemWidget::gridFilter($fieldId, $field, $params['FieldProductValue'][$fieldId]['null']);
            } else {
                $filter = SystemWidget::gridFilter($fieldId, $field);
            }
            $dataProvider->setSort([
                'attributes' =>
                    ArrayHelper::merge($dataProvider->sort->attributes,
                        [
                            'FieldProductValue' . $fieldId
                            => [
                                'label' => $field->name,
                            ],
                        ]),
            ]);
            $columns [] = [
                'label' => $field->name,
                'attribute' => 'FieldProductValue' . $fieldId,
                'value' => function ($model) use ($field, $allFieldProductValue) {
                    Yii::debug('field');
                    Yii::debug($field);
                    Yii::debug('model');
                    Yii::debug($model);
                    Yii::debug('allFieldProductValue');
                    Yii::debug($allFieldProductValue);
                    foreach ($allFieldProductValue as $fieldProductValue) {
                        if ($fieldProductValue->field_id == $field->id && $fieldProductValue->product_id == $model->id) {
                            if (is_array($fieldProductValue->value)) {
                                $multiSelectFieldProductValues = '';
                                foreach ($fieldProductValue->value as $multiSelectFieldProductValue) {
                                    if (empty($multiSelectFieldProductValues)) {
                                        $multiSelectFieldProductValues = $multiSelectFieldProductValue;
                                    } else {
                                        $multiSelectFieldProductValues .= ', ' . $multiSelectFieldProductValue;
                                    }
                                }
                                return $multiSelectFieldProductValues;
                            }
                            return $fieldProductValue->value;
                        }
                    }
                    return null;
                },
                'filter' => $filter,
            ];
        }
    }
    ?>


    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $('.select2.field').on('change', function (e) {
                console.log('эчто');
                if (e.keyCode === 13) {
                    alert('dwafesgr');
                }
            })
        })

    </script>

    <?php if (!isset($_GET['catalog'])) :
        $withoutHeader = (isset($_GET['without-header'])) ?
            'without-header&' : '';
        ?>

        <a class="btn btn-default forma_light_orange" href='?catalog' data-pjax="0"><i class="fa fa-list"></i>
            Каталог</a>
        <?= Html::activeDropDownList($searchModel, 'category_id',
        Category::getList(), ['prompt' => 'Все категории', 'class' => 'btn btn-success forma_light_orange',
            'onchange' => 'window.location.href = "/product/product/index?' . $withoutHeader . 'ProductSearch[category_id]="+ $(this).val()'
        ]) ?>
        <a class="btn btn-success forma_light_orange" href='/product/product/create' data-pjax="0"><i
                    class="fa fa-plus"></i> Новый объект</a>
        <br><br>

        <?php
        $applyFilterTableCategory = (isset($_GET['ProductSearch']['category_id']) && is_numeric($_GET['ProductSearch']['category_id'])) ?
            [
                'content' => '<button onclick="$(\'#grid-product\').yiiGridView(\'applyFilter\');" class="btn btn-success forma_light_orange"> <i class="glyphicon glyphicon-search"></i> Поиск по таблице </button>',
            ]
            :
            ['content' => ''];
        ?>
        <?php
        $applyFilterTableCategory = (isset($_GET['ProductSearch']['category_id']) && isset($_GET['ProductSearch'])) ?
            [
                'content' => '<a class="btn btn-success" href="/product/product/index">Сбросить фильтры</a>',
            ]
            :
            ['content' => ''];
        ?>

        <?= DynaGrid::widget([
        'allowSortSetting' => false,
        'showPersonalize' => true,
        'allowFilterSetting' => false,
        'theme' => 'panel-default',
        'columns' => $columns,
        'options' => ['id' => 'dynagrid-' . $searchModel->tableName()],
        'gridOptions' => [
            'editableMode' => false,
            'displayEmptyValue' => true,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsiveWrap' => false,
            'options' => ['id' => 'grid-' . $searchModel->tableName()],
            'toolbar' => [
                $applyFilterTableCategory,
                [
                    'content' => Html::a('<i class="glyphicon glyphicon-plus"></i> Добавить', ['create'], ['class' => 'btn btn-success forma_light_orange']),
                ],
                [
                    'content' => Html::button('<i class="glyphicon glyphicon-trash"></i> Удалить', [
                        'type' => 'button',
                        'class' => 'btn btn-danger forma_light_orange',
                        'onclick' => '$("#grid-' . $searchModel->tableName() . '")
                        .groupOperation("' . Url::to(['/product/product/delete-selection']) . '", {
                            message: "Are you sure you want to delete selected items?"
                        });
                    ',
                    ]),
                ],
                [
                    'content' => ButtonDropdown::widget([
                        'label' => '<i class="glyphicon glyphicon-import"></i>',
                        'encodeLabel' => false,
                        'dropdown' => [
                            'items' => [
                                ['label' => 'Import file', 'options' => [
                                    'onclick' => '$("#import-file-input").trigger("click");',
                                    'style' => 'cursor: pointer;',
                                ]],
                                [
                                    'label' => 'Example of file',
                                    'options' => [
                                        'onclick' => 'location.href = "/product/product/download-example-file"',
                                        'style' => 'cursor: pointer;',
                                    ],
                                ],
                            ],
                        ],
                        'options' => ['class' => 'btn btn-default forma_light_orange'],
                    ]),
                ],
                '{export}',
                '{toggleData}',
                '{dynagrid}',
            ],
        ],
    ]); ?>
    <?php else : ?>

        <br><br>
        <a class="btn btn-default" href='?' data-pjax="0"><i class="fa fa-table"></i> Таблица</a>
        <a class="btn btn-success" href='/product/product/create' data-pjax="0"><i class="fa fa-plus"></i> Новый объект</a>
        <?= Html::activeDropDownList($searchModel, 'category_id',
        Category::getList(), ['prompt' => 'Все категории', 'class' => 'btn btn-success',
            'onchange' => 'window.location.href = "/product/product/index?catalog=&ProductSearch[category_id]="+ $(this).val()'
        ]) ?>
        <button class="btn btn-success" data-toggle="collapse" data-target="#hide-me"><i class="fa fa-search"></i> Поиск
        </button>
        <br><br>
        <div class="admin-search collapse" id="hide-me">
            <?php if (!isset($fieldsList)) {
                echo $this->render('_search', ['model' => $searchModel]);
            } else {
                echo $this->render('_search', ['model' => $searchModel, 'fieldsList' => $fieldsList,]);
            }
            ?>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',
            'itemOptions' => ['class' => 'col-md-3', 'style' => 'height: 150px; padding-left: 0;']
        ]); ?>

    <?php endif ?>

</div>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        //РАБОТА НА СТРАНИЦЕ ПРОДУКТОВ С ВИДЖЕТОМ SWITCHINPUT
        let t = setTimeout(function () {

            if ($('.switchInputContainer').length) {
                console.log('Клик на клик');

                $('.switchInputContainer input[type="hidden"]').each(function () {
                    this.value = '';
                });

                // console.log($('.bootstrap-switch-label, .bootstrap-switch-handle-off, .bootstrap-switch-handle-on'));
                // $('.bootstrap-switch-label, .bootstrap-switch-handle-off, .bootstrap-switch-handle-on').each(function () {
                //     this.onclick = function () {
                //         console.log("КЛик на лабле");
                //         //let switchInputContainer = this.closest('.switchInputContainer');
                //         $(this).parents('.switchInputContainer').find('input[type="hidden"]')[0].value = 0;
                //         console.log($(this).parents('.switchInputContainer').find('input[type="hidden"]'));
                //     };
                // });

                let elems = $('.bootstrap-switch-label, .bootstrap-switch-handle-off, .bootstrap-switch-handle-on');

                for (let i = 0; i < elems.length; i++) {
                    elems[i].onclick = function () {
                        console.log("КЛик на лабле");
                        //let switchInputContainer = this.closest('.switchInputContainer');
                        $(this).parents('.switchInputContainer').find('input[type="hidden"]')[0].value = 0;
                        console.log($(this).parents('.switchInputContainer').find('input[type="hidden"]'));
                    }
                }


                $('span.close.kv-ind-toggle').each(function () {
                    this.onclick = function () {
                        //let switchInputContainer = this.closest('.switchInputContainer');
                        $(this).parents('.switchInputContainer').find('input[type="hidden"]')[0].value = '';
                        console.log($(this).parents('.switchInputContainer').find('input[type="hidden"]'));
                        $('#grid-product').yiiGridView('applyFilter')
                    };
                });
            }
        }, 1)

    });
</script>