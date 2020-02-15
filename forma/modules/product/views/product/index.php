<?php

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

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\product\records\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile('@web/js/plugins/group-operation.plugin.js', ['position' => View::POS_BEGIN]);
$this->registerJsFile('@web/js/common.js', ['position' => View::POS_END]);

$this->title = 'Объекты учета';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">

    <input id="import-file-input" type="file" style="display: none;">

    <?php Pjax::begin(['id' => 'pjax-product-grid']); ?>

    <?php $columns = [
        ['class'=>'kartik\grid\CheckboxColumn'],

        [
            'attribute' => 'sku',
            'label' => 'Артикул',
        ],
        [
            'attribute' => 'type_id',
            'value' => 'type.name',
            'filter' => Type::getList(),
        ],
        [
            'attribute' => 'sizeColumnValue',
            'label' => 'Размер',
        ],
        [
            'attribute' => 'category_id',
            'value' => 'category.name',
            'filter' => Category::getList(),
        ],
        [
            'attribute' => 'manufacturer_id',
            'value' => 'manufacturer.name',
            'filter' => Manufacturer::getList(),
        ],
        'name',
        [
            'attribute' => 'volume',
            'value' => 'volumeLabel',
            'shortLabel' => 'Об',
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'color_name',
            'value' => function($model, $value, $index, $widget) {
                if (!$model->color) {
                    return null;
                }
                $color = $model->color->name;
                return '<span class="badge" style="border: 1px #777 solid; background-color: ' . $color . ';">&nbsp;</span>' .
                    '<code>' . $color . '</code>';
            },
            'filterType' => GridView::FILTER_COLOR,
            'filterWidgetOptions' => [
                'showDefaultPalette' => false,
                'pluginOptions' => [
                    'showPaletteOnly' => true,
                    'preferredFormat' => 'name',
                    'palette' => Color::getPallet(),
                ],
                'options' => ['style' => 'display: none;'],
                'pluginEvents' => [
                    'change' => 'function() {
                        $(".sp-palette-only").hide();
                    }',
                ],
            ],
            'format' => 'raw',
            'label' => 'Цвет',
        ],
        [
            'attribute' => 'year_chart',
            'shortLabel' =>'Год',
        ],
        [
            'attribute' => 'proof',
            'shortLabel' =>'Кр',
        ],
        [
            'class' => CombinedDataColumn::className(),
            'labelTemplate' => '{0}  /  {1}',
            'valueTemplate' => '{0}  /  {1}',
            'attributes' => [
                'batcher:text',
                'rating:decimal',
            ],
            'values' => [
                'batcherLabel',
                'rating',
            ],
            'filter' => false,
            'label' => 'Дозатор / Рейтинг',
        ],
        [
            'attribute' => 'country_id',
            'value' => 'country.name',
            'filter' => Country::getList(),
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
        ],
    ]; ?>

    <?php if (isset($_GET['table'])) : ?>

        <a class="btn btn-default" href='?' data-pjax="0"><i class="fa fa-list"></i> Список</a>
        <a class="btn btn-success" href='/product/product/create' data-pjax="0"><i class="fa fa-plus"></i> Новый объект</a>

        <br><br>

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
                            'type'=>'button',
                            'class'=>'btn btn-danger',
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
        ]);?>

    <?php else : ?>

        <a class="btn btn-default" href='?table' data-pjax="0"><i class="fa fa-table"></i> Таблица</a>
        <a class="btn btn-success" href='/product/product/create' data-pjax="0"><i class="fa fa-plus"></i> Новый объект</a>
        <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me"><i class="fa fa-search"></i> Поиск</button>
        <br><br>
        <div class="admin-search collapse" id="hide-me">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',

            'itemOptions' => ['class' => 'col-md-4', 'style' => 'height: 150px; padding-left: 0;']
        ]);?>

    <?php endif ?>

    <?php Pjax::end(); ?>

</div>
