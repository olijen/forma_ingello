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

$data1 = Category::getList();
$data1 = [
    'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado',
    'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
    'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
    'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
    'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
    'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
    'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];
//de($data1);
echo Typeahead::widget([
    'name' => 'state_12',
    'options' => ['placeholder' => 'Filter as you type ...'],
    'pluginOptions' => ['highlight'=>true],
    'dataset' => [
        [
            'local' => $data1,
            'limit' => 15
        ]
    ]
]);



//echo FileInput::widget([
//    'model' => $searchModel,
//    'attribute' => 'id',
//    'options' => ['multiple' => true]
//]);



?>

<div class="product-index">

    <input id="import-file-input" type="file" style="display: none;">

    <?php $columns = [
        ['class' => 'kartik\grid\CheckboxColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
        ],
        'name',

//        [
//            'attribute' => 'category_id',
//            'value' => 'category.name',
//            'filter' => Category::getList(),
//        ],
//        [
//            'attribute' => 'sku',
//            'label' => 'Артикул',
//        ],
//
//        [
//            'attribute' => 'type_id',
//            'value' => 'type.name',
//            'filter' => Type::getList(),
//        ],
//        [
//            'attribute' => 'manufacturer_id',
//            'value' => 'manufacturer.name',
//            'filter' => Manufacturer::getList(),
//        ],
//        [
//            'class' => CombinedDataColumn::className(),
//            'attributes' => 'rating:decimal',
//            'values' => 'rating',
//            'filter' => false,
//            'label' => 'Рейтинг',
//        ],
    ];

    if (isset($fieldValues)) {
        $params = Yii::$app->request->queryParams;
        foreach ($fieldValues as $key => $fieldValue) {
            if (isset($params['FieldProductValue'])){
                $filter = SystemWidget::gridFilter($key, $fieldValue, false, $params['FieldProductValue'][$key]['null']);
            }else{
                $filter = SystemWidget::gridFilter($key, $fieldValue, false);
            }
            $dataProvider->setSort([
                'attributes' =>
                    ArrayHelper::merge($dataProvider->sort->attributes,
                        [
                            'FieldProductValue'.$key
                            =>[
                                'asc' => ['field_product_value.value' => SORT_ASC],
                                'desc' => ['field_product_value.value' => SORT_DESC],
                                'label' => $fieldValue->name,
                            ],
                        ]),
            ]);
            $columns [] = [
                'label' => $fieldValue->name,
                'attribute'=> 'FieldProductValue'.$key,
                'value' => function ($model) use ($fieldValue) {
                    $FieldProductValue = $model->getFieldProductValue($model->id, $fieldValue);
                    $multiSelectValue = json_decode($FieldProductValue);
                    if (is_array($multiSelectValue)) {
                        $fieldValueArray = \forma\modules\product\records\FieldValue::findAll($multiSelectValue);
                        if (!empty($fieldValueArray)) {
                            $fieldValues = '';
                            foreach ($fieldValueArray as $fieldValue) {
                                if (empty($fieldValues)) {
                                    $fieldValues .= $fieldValue->name;
                                } else {
                                    $fieldValues .= ', ' . $fieldValue->name;
                                }
                            }
                            return $fieldValues;
                        } else {
                            return null;
                        }
                    }

                    return $FieldProductValue;
                },
                'filter' => $filter,
            ];
        }
    }
    ?>




    <?php if (!isset($_GET['catalog'])) : ?>

        <a class="btn btn-default" href='?catalog' data-pjax="0"><i class="fa fa-list"></i> Каталог</a>
        <?= Html::activeDropDownList($searchModel, 'category_id',
        Category::getList(), ['prompt' => '', 'class' => 'btn btn-info',
//            'onchange' => 'window.location.href = "/index?ProductSearch%5Bcategory_id%5D="+ $(this).val()' TODO Спросить разницу у Олега
            'onchange' => 'window.location.href = "/product/product/index?ProductSearch[category_id]="+ $(this).val()'
        ]) ?>
        <a class="btn btn-success" href='/product/product/create' data-pjax="0"><i class="fa fa-plus"></i> Новый объект</a>
        <br><br>

        <!---->
        <?php
//= GridView::widget([
//
//        ])


//        $columns [] = [
//            'label' => 'widget',
//        ];


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
                    [
                        'content' => Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']),
                    ],
                    [
                        'content' => Html::button('<i class="glyphicon glyphicon-trash"></i>', [
                            'type' => 'button',
                            'class' => 'btn btn-danger',
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
                            'options' => ['class' => 'btn btn-default'],
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
        Category::getList(), ['prompt' => '', 'class' => 'btn btn-info',
            'onchange' => 'window.location.href = "/product/product/index?catalog=&ProductSearch[category_id]="+ $(this).val()'
        ]) ?>
        <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me"><i class="fa fa-search"></i> Поиск
        </button>
        <br><br>
        <div class="admin-search collapse" id="hide-me">
            <?php if (!isset($fieldValues)) {
                echo $this->render('_search', ['model' => $searchModel]);
            } else {
                echo $this->render('_search', ['model' => $searchModel, 'fieldValues' => $fieldValues,]);
            }
            ?>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',

            'itemOptions' => ['class' => 'col-md-4', 'style' => 'height: 150px; padding-left: 0;']
        ]); ?>

    <?php endif ?>

</div>
