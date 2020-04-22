<?php

use kartik\dynagrid\DynaGrid;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\product\records\Type;
use yii\helpers\Url;
use forma\modules\product\records\Color;
use kartik\grid\GridView;
use forma\modules\country\records\Country;
use forma\modules\warehouse\records\WarehouseProduct;
use yii\web\View;
use kartik\export\ExportMenu;

/**
 * @var $this yii\web\View
 * @var $warehouseProductsDataProvider \yii\data\ActiveDataProvider
 * @var $warehouseProductsSearchModel \forma\modules\warehouse\records\WarehouseProductSearch
 */

$this->title = 'Все объекты';
$this->params['breadcrumbs'][] = ['label' => 'Все хранилища', 'url' => ['index']];

?>
<div class="warehouse-view">

    <p></p>

    <?php

    $columns = [
        ['class'=>'kartik\grid\CheckboxColumn'],

        [
            'attribute' => 'warehouse_id',
            'value' => 'warehouse.name',
            'label' => 'Склад',
            'filter' => Warehouse::getList(),
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
            'label' => 'Группа товара',
        ],
        [
            'attribute' => 'product.sizeColumnValue',
            'encodeLabel' => false,
            'label' => '<span>Размер</span>',
        ],
        [
            'attribute' => 'quantity',
        ],
        [
            'value' => 'expected',
            'encodeLabel' => false,
            'label' => '<span title="Ожидается">Ожи...</span>',
        ],
        [
            'value' => 'reserved',
            'encodeLabel' => false,
            'label' => '<span title="В резерве">Рез...</span>',
        ],

        [
            'attribute' => 'product_manufacturer_name',
            'value' => 'product.manufacturer.name',
            'label' => 'Производитель',
        ],
        [
            'attribute' => 'purchase_cost',
            'encodeLabel' => false,
            'label' => '<span title="Цена закупки">Ц.З.</span>',
        ],
        [
            'encodeLabel' => false,
            'label' => '<span title="Цена закупки с учетом налога и накладных расходов">Ц.З.(Н.Р.)</span>',
            'value' => function(WarehouseProduct $obj) {
                if (is_null($obj->purchase_cost)) {
                    return null;
                }
                return $obj->purchase_cost + $obj->tax + $obj->overhead_cost;
            },
        ],
        [
            'attribute' => 'consumer_cost',
            'encodeLabel' => false,
            'label' => '<span title="Розничная цена">Роз.Ц.</span>',
        ],
        [
            'attribute' => 'recommended_cost',
            'encodeLabel' => false,
            'label' => '<span title="Рекомендованная цена">Р.Ц.</span>',
        ],
        [
            'attribute' => 'trade_cost',
            'encodeLabel' => false,
            'label' => '<span title="Оптовая цена">О.Ц.</span>',
        ],
        'tax',
        [
            'attribute' => 'product_country_id',
            'value' => 'product.country.name',
            'filter' => Country::getList(),
            'label' => 'Страна',
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'product_color_name',
            'value' => function($model, $value, $index, $widget) {
                if (!$model->product->color) {
                    return null;
                }
                $color = $model->product->color->name;
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
            'attribute' => 'product_customs_code',
            'value' => 'product.customs_code',
            'label' => 'Таможенный код',
        ],
        [
            'attribute' => 'product_proof',
            'value' => 'product.proof',
            'encodeLabel' => false,
            'label' => '<span title="Крепость">Кр...</span>',
        ],
    ];

    $columns[] = [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update}{delete}',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to(["/warehouse/warehouse-product/$action", 'id' => $model->id]);
        },
    ];

    ?>

    <input id="import-file-input" type="file" style="display: none;">
    <?= $this->registerJsFile('@web/js/common.js', ['position' => View::POS_END]); ?>

    <?php Pjax::begin(['id' => 'pjax-grid-remains']); ?>

    <?= DynaGrid::widget([
        'columns' => $columns,
        'options' => ['id' => 'dynagrid-remains'],
        'theme' => 'panel-default',
        'showPersonalize' => true,
        'allowFilterSetting' => false,
        'allowSortSetting' => false,
        'gridOptions' => [
            'dataProvider' => $warehouseProductsDataProvider,
            'filterModel' => $warehouseProductsSearchModel,
            'options' => ['id' => 'grid-remains'],
            'toolbar' => [
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
                    ]),
                ],
                '{export}',
                '{toggleData}',
                '{dynagrid}',
            ],
            'export' => [
                'target' => ExportMenu::TARGET_SELF,
                'showConfirmAlert' => false,
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
