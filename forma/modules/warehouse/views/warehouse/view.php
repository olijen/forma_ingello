<?php

use yii\helpers\Html;
use yii\helpers\Url;
use forma\extensions\kartik\DynaGrid;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;
use forma\modules\product\records\Type;
use forma\modules\country\records\Country;
use kartik\grid\GridView;
use forma\modules\product\records\Color;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\components\CombinedDataColumn;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\Warehouse */

/** @var yii\data\ActiveDataProvider $warehouseProductsDataProvider */
/** @var forma\modules\warehouse\records\WarehouseProductSearch $warehouseProductsSearchModel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Хранилища', 'url' => ['index']];

$this->registerJsFile('@web/js/dyna-grid-change-icon.js', ['position' => \yii\web\View::POS_BEGIN]);
?>
<div class="warehouse-view">

    <?php

    $columns = [
        ['class'=>'kartik\grid\CheckboxColumn'],
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'warehouse_id',
            'value' => 'warehouse.name',
            'hide' => true,
        ],
        [
            'attribute' => 'product_sku',
            'value' => 'product.sku',
            'label' => 'Артикул',
        ],
        [
            'attribute' => 'product_name',
            'value' => 'product.name',
            'label' => 'Товар',
        ],
        [
            'attribute' => 'product_type_id',
            'value' => 'product.type.name',
            'filter' => Type::getList(),
            'label' => 'Группа товаров',
        ],
//        [
//            'attribute' => 'product.sizeColumnValue',
//            'label' => 'Размер',
//        ],
    ];

    $columns = array_merge($columns, [
        [
            'attribute' => 'quantity',
        ],
        [
            'value' => 'expected',
            'label' => 'Ожидается',
            'shortLabel' => 'Ожи',
            'skipExport' => true,
        ],
        [
            'value' => 'reserved',
            'label' => 'В резерве',
            'shortLabel' => 'Рез',
            'skipExport' => true,
        ],

        [
            'attribute' => 'product_manufacturer_name',
            'value' => 'product.manufacturer.name',
            'label' => 'Производитель',
        ],
        [
            'attribute' => 'currency.code',
            'label' => 'Валюта закупки',
            'shortLabel' => 'В.З.',
        ],
        [
            'attribute' => 'purchase_cost',
            'label' => 'Цена закупки',
            'shortLabel' => 'Ц.З.',
        ],
        [
            'label' => 'Цена закупки с учетом налога и накладных расходов',
            'value' => function(WarehouseProduct $obj) {
                if (is_null($obj->purchase_cost)) {
                    return null;
                }
                return $obj->purchase_cost + $obj->tax + $obj->overhead_cost;
            },
            'shortLabel' => 'Ц.З.(Н.Р.)',
            'skipExport' => true,
        ],
        [
            'attribute' => 'consumer_cost',
            'label' => 'Розничная цена',
            'shortLabel' => 'Роз.Ц.',
        ],
        [
            'attribute' => 'recommended_cost',
            'label' => 'Рекомендованная цена',
            'shortLabel' => 'Р.Ц.',
        ],
        [
            'attribute' => 'trade_cost',
            'label' => 'Оптовая цена',
            'shortLabel' => 'О.Ц.',
        ],
        'tax',
        [
            'attribute' => 'overhead_cost',
            'hide' => true,
            'label' => 'Накладной расход',
        ],
//        [
//            'attribute' => 'product_country_id',
//            'value' => 'product.country.name',
//            'filter' => Country::getList(),
//            'label' => 'Страна',
//        ],
//        [
//            'class' => '\kartik\grid\DataColumn',
//            'attribute' => 'product_color_name',
//            'value' => function($model, $value, $index, $widget) {
//                if (!$model->product->color) {
//                    return null;
//                }
//                $color = $model->product->color->name;
//                return '<span class="badge" style="border: 1px #777 solid; background-color: ' . $color . ';">&nbsp;</span>' .
//                '<code>' . $color . '</code>';
//            },
//            'filterType' => GridView::FILTER_COLOR,
//            'filterWidgetOptions' => [
//                'showDefaultPalette' => false,
//                'pluginOptions' => [
//                    'showPaletteOnly' => true,
//                    'preferredFormat' => 'name',
//                    'palette' => Color::getPallet(),
//                ],
//                'options' => ['style' => 'display: none;'],
//                'pluginEvents' => [
//                    'change' => 'function() {
//                        $(".sp-palette-only").hide();
//                    }',
//                ],
//            ],
//            'format' => 'raw',
//            'label' => 'Цвет',
////        ],
//        [
//            'attribute' => 'product_customs_code',
//            'value' => 'product.customs_code',
//            'label' => 'Таможенный код',
//        ],
//        [
//            'attribute' => 'product_proof',
//            'value' => 'product.proof',
//            'label' => 'Крепость',
//            'shortLabel' => 'Кр',
//        ],
        [
//            'class' => CombinedDataColumn::className(),
////            'labelTemplate' => '{0}  /  {1}',
//            'valueTemplate' => '{0}  /  {1}',
            'attribute' =>
//                [
//                'product.batcher:text',
                'product.rating:decimal',
//            ],
            'value' =>
//                [
//                'product.batcherLabel',
                'product.rating',
//            ],
            'filter' => false,
            'label' => ' Рейтинг',
        ],
//        [
//            'attribute' => 'product.year_chart',
//            'hide' => true,
//        ],
        [
            'value' => 'product.category.name',
            'label' => 'Категория',
            'hide' => true,
        ],
    ]);

    $columns[] = [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update}{delete}',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to(["/warehouse/warehouse-product/$action", 'id' => $model->id]);
        },
    ];

    ?>

    <input id="import-file-input" type="file" style="display: none;">
    <?= $this->registerJsFile('@web/js/common.js', ['position' => yii\web\View::POS_END]); ?>

    <?php Pjax::begin(['id' => 'pjax-grid-remains']); ?>

    <?php if (isset($_GET['list'])) : ?>

        <a class="btn btn-default" href="<?= Url::to(['view', 'id' => $model->id]) ?>" data-pjax="0">
            <i class="fa fa-table"></i>
            Таблица
        </a>
        <br>
        <br>

        <?= ListView::widget([
            'dataProvider' => $warehouseProductsDataProvider,
            'itemView' => '_product',
            'layout' => "{items}",
            'itemOptions' => ['class' => 'col-md-4', 'style' => 'height: 150px; padding-left: 0;']
        ]); ?>

    <?php else : ?>

    <a class="btn btn-default" href="<?= Url::to(['view', 'id' => $model->id, 'list' => true]) ?>" data-pjax="0">
        <i class="fa fa-list"></i>
        Список
    </a>
    <br>
    <br>
        <?php

        $items = [];
        foreach (\forma\modules\warehouse\records\Warehouse::getList() as $id => $name) {
            if($id == $model->id){
                continue;
            }
            $items[] = ['label' => $name, 'url' => 'javascript:void(0)','linkOptions'=>['data-warehouse'=>$id,'class'=>'warehouse-list']];
        }
        ?>

    <?= DynaGrid::widget([
        'allowSortSetting' => false,
        'showPersonalize' => true,
        'allowFilterSetting' => false,
        'theme' => 'panel-default',
        'columns' => $columns,
        'options' => ['id' => 'dynagrid-remains'],
        'gridOptions' => [
            'editableMode' => false,
            'displayEmptyValue' => true,
            'pjax' => true,
            'dataProvider' => $warehouseProductsDataProvider,
            'filterModel' => $warehouseProductsSearchModel,
            'options' => ['id' => 'grid-remains'],
            'responsiveWrap' => false,
            'toolbar' => [
                [
                    'content' => Html::a('<i class="glyphicon glyphicon-plus"></i> Добавить', ['/warehouse/warehouse-product/create', 'warehouse_id' => $model->id], [
                        'class' => 'btn btn-success',
                        'title' => 'Добавить товар',
                    ]),
                ],
                [
                    'content' => Html::button('<i class="glyphicon glyphicon-trash"></i> Удалить', [
                        'type'=>'button',
                        'class'=>'btn btn-danger',
                        'onclick' => '$("#grid-remains")
                        .groupOperation("' . Url::to(['warehouse-product/delete-selection', 'warehouse_id' => $model->id]) . '", {
                            message: "Are you sure you want to delete selected items?"
                        });
                    ',
                        'title' => 'Удалить',
                    ]),
                ],
                [
                    'content' => Html::button('<i class="fa fa-credit-card"></i> Закупить', [
                        'class' => 'btn btn-primary',
                        'id' => 'create-purchase',
                        'title' => 'Создать(Добавить в) закупку',
                    ]),
                ],
                [
                    'content' => Html::button('<i class="fa fa-arrows-alt"></i> Продать', [
                        'class' => 'btn btn-primary',
                        'id' => 'add-to-selling',
                        'title' => 'Добавить в продажу',
                        'onClick'=>'alert("Пожалуйста, выберите клиента и нажмите кнопку Сохранить");'
                    ]),
                ],
                [
                    'content' => ButtonDropdown::widget([
                        'label' => 'Добавить в перемещение',
                        'dropdown' => [
                            'items' => $items,
                        ],
                        'options' => ['class' => 'btn btn-success forma_light_orange'],
                    ])
                       /* Html::button('<i class="fa fa-retweet"></i> Переместить', [
                        'class' => 'btn btn-primary',
                        'id' => 'add-to-transit',
                        'title' => 'Добавить в перемещение',
                    ]),*/
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
                                        'onclick' => 'location.href = "/warehouse/warehouse/download-example-file"',
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

    <?php endif ?>

    <?php Pjax::end(); ?>

</div>

