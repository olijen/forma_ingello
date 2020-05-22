<?php

use kartik\color\ColorInput;
use kartik\select2\Select2;
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
////

use forma\modules\product\components\SystemWidget;
use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use forma\modules\product\records\Product;
use forma\modules\product\records\PackUnit;
use forma\modules\core\widgets\DetachedBlock;


use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel forma\modules\product\records\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile('@web/js/plugins/group-operation.plugin.js', ['position' => View::POS_BEGIN]);
$this->registerJsFile('@web/js/common.js', ['position' => View::POS_END]);

$this->title = 'Объекты учета';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

?>

<div class="product-index">

    <input id="import-file-input" type="file" style="display: none;">

    <?php Pjax::begin(['id' => 'pjax-product-grid']); ?>

    <?php $columns = [
        ['class' => 'kartik\grid\CheckboxColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
        ],
        'name',
//        [
//            'attribute' => 'sku',
//            'label' => 'Артикул',
//        ],
        [
            'attribute' => 'type_id',
            'value' => 'type.name',
            'filter' => Type::getList(),
        ],
        [
            'label' => 'ochko',
        ]
//        [
//            'attribute' => 'category_id',
//            'value' => 'category.name',
//            'filter' => Category::getList(),
//        ],
//        [
//            'attribute' => 'manufacturer_id',
//            'value' => 'manufacturer.name',
//            'filter' => Manufacturer::getList(),
//        ],
//        [
//            'attribute' => 'country_id',
//            'value' => 'country.name',
//            'filter' => Country::getList(),
//        ],

    ];



//    de($dataProvider->getModels());
    if (isset($fieldAttributes)) {

        foreach ($fieldAttributes as $key => $fieldAttribute) {
            $filter = SystemWidget::getByName($key, $fieldAttribute);

            $columns [] = [
                'label' => 'ochko213wq412esa',
//                'value' => function ($model) use ($fieldAttribute) {
//                    return $model->getWidgetValues($model->id, $fieldAttribute);
//                },
//                'filter' => $filter,
            ];
//            de($columns);
//            var_dump($fieldAttribute->name);
//            de($columns);

        }
    }
    ?>




    <?php if (!isset($_GET['catalog'])) : ?>

        <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get']); ?>

        <?= $form->field($searchModel, 'category_id')->dropDownList(Category::getList(), ['class' => 'btn btn-info']); ?>
        <?= Html::submitButton('Выбрать категорию', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>

        <a class="btn btn-default" href='?catalog' data-pjax="0"><i class="fa fa-list"></i> Каталог</a>
        <a class="btn btn-success" href='/product/product/create' data-pjax="0"><i class="fa fa-plus"></i> Новый объект</a>


        <br><br>
        <!--    --><? //=  Select2::widget([
//            'model' => new Category,
//            'attribute' => 'id',
//            'data' => Category::getList(),
//            'options' => ['placeholder' => 'Select a state ...',],
//            'pluginEvents' => [
//                "select2:select" => "function() {
//
//                      $.pjax({         
//                             type : 'POST',         
//                             url : '/product/product/pjax-grid-index',
//                             container: '#pjax-product-grid-index',         
//                             data :  $(this).serialize(),
//                             push: false,
//                             replace: false,         
//                             timeout: 10000,         
//                             \"scrollTo\" : false     
//                      })
//                     }",
//            ],
//        ]);
//        ?>
        <br><br>

<!--        --><?php //Pjax::begin(['id' => 'pjax-product-grid-index']); ?>
        <?= DynaGrid::widget([
            'id' => 'test_id_pjax',
            'allowSortSetting' => false,
            'showPersonalize' => true,
            'allowFilterSetting' => false,
            'theme' => 'panel-default',
            'columns' => $columns,
            'options' => ['id' => 'dynagrid-' . $searchModel->tableName()],
            'gridOptions' => [
                'editableMode' => false,
                'displayEmptyValue' => true,
                'pjax' => true,
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
<!--        --><?php //Pjax::end(); ?>
    <?php else : ?>


        <?php $form = ActiveForm::begin(['action' => ['index?catalog'], 'method' => 'get']); ?>

        <?= $form->field($searchModel, 'category_id')->dropDownList(Category::getList(), ['class' => 'btn btn-info']); ?>
        <?= Html::submitButton('Выбрать категорию', ['class' => 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>
        <a class="btn btn-default" href='?' data-pjax="0"><i class="fa fa-table"></i> Таблица</a>
        <a class="btn btn-success" href='/product/product/create' data-pjax="0"><i class="fa fa-plus"></i> Новый объект</a>
        <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me"><i class="fa fa-search"></i> Поиск
        </button>
        <br><br>
        <div class="admin-search collapse" id="hide-me">
            <?php if (!isset($fieldAttributes)) {
                echo $this->render('_search', ['model' => $searchModel]);
            } else {
                echo $this->render('_search', ['model' => $searchModel, 'fieldAttributes' => $fieldAttributes,]);
            }
            ?>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',

            'itemOptions' => ['class' => 'col-md-4', 'style' => 'height: 150px; padding-left: 0;']
        ]); ?>

    <?php endif ?>

    <?php Pjax::end(); ?>

</div>
