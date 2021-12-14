<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\superselling\SellingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $sellingExport \forma\modules\selling\records\selling\Selling */

$this->title = 'Продажи';
$this->registerJsFile('@web/js/plugins/group-operation.plugin.js', ['position' => \yii\web\View::POS_BEGIN]);
$this->params['breadcrumbs'][] = $this->title;
$warehouseIsVisible = \forma\modules\warehouse\records\Warehouse::find()
    ->joinWith('warehouseUsers')->where(['warehouse_user.user_id' => Yii::$app->user->id])
    ->select(['warehouse.id'])->all();
?>
<style>

    .no-hover {
        //pointer-events: none;
        background: #EEFCFF;
        background-color: #F1F4FB;
    }
    .no-hover:hover{
        background: #EEFCFF;
    }
</style>
<div class="selling-index">
    <a href="/selling/form/index" class="btn btn-success forma_blue"> <i class="fa fa-plus"></i> Новая продажа </a>
    <hr>

    <?php
    $gridColumns = [

        ['class' => 'kartik\grid\CheckboxColumn'],
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action == 'update') {
                    return \yii\helpers\Url::to(['/selling/form', 'id' => $model->id]);
                }
                if ($action == 'delete') {
                    return \yii\helpers\Url::to(['delete', 'id' => $model->id]);
                }
            }
        ],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'enableRowClick' => true,
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detailRowCssClass' => 'no-hover',
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_search', ['model' => $model]);
            },

        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'customerName',
            'label' => 'Клиент',
            'value' => 'customer.name',
            //'pageSummary' => 'Total',
            'vAlign' => 'middle',
            'width' => '210px',
            'editableOptions' => function ($model, $key, $index) {
                return [
                    'header' => ' клиента',
                    'size' => 'md',
                    'options' => [
                        'value' => (isset($model->customer->name) ? $model->customer->name : ''),
                    ],
                ];
            },
            'contentOptions' => ['class' => 'no-load'],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'customerPhone',
            'label' => 'Номер',
            'value' => 'customer.chief_phone',
            //'pageSummary' => 'Total',
            'vAlign' => 'middle',
            'width' => '210px',
            'editableOptions' => function ($model, $key, $index) {
                return [
                    'header' => ' телефон клиента',
                    'size' => 'md',
                    'options' => [
                        'value' => (isset($model->customer->chief_phone) ? $model->customer->chief_phone : ''),
                    ],
                ];
            },
            'contentOptions' => ['class' => 'no-load'],

        ],
        [
            'attribute' => 'warehouseName',
            'vAlign' => 'middle',
            'width' => '180px',
            'label' => 'Место',
            'value' => function ($model, $key, $index, $widget) use ($warehouseIsVisible) {
                $warehouse = $model->warehouse;
                $isVisible = false;
                if ($model->warehouse) {
                    foreach ($warehouseIsVisible as $value) {
                        if ($value->id == $warehouse->id) {
                            $isVisible = true;
                        }
                    }
                    if ($isVisible == true) {
                        return Html::a($warehouse->name,
                            "/warehouse/warehouse/view?id=$warehouse->id",
                            ['title' => 'Можно перейти на склад', 'onclick' => 'alert("Открыть страницу склада?")']);
                    } else {
                        return $warehouse->name;
                    }
                } else {
                    return null;
                }

            },

            'filter' => \yii\helpers\ArrayHelper::map(\forma\modules\warehouse\records\Warehouse::getMyWarehouses(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => false, 'pjax' => false],
                'value' => isset($_GET['SellingSearch']['warehouseName']) ?
                    $_GET['SellingSearch']['warehouseName'] : '',
                'options' => ['placeholder' => 'Выбрать склад...'],
                'model' => $searchModel,
                'attribute' => 'warehouseName',
                'data' => \yii\helpers\ArrayHelper::map(\forma\modules\warehouse\records\Warehouse::find()->all(), 'id', 'name'),
            ],
            'format' => 'raw',

        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'stateName',
            'value' => 'toState.name',
            'label' => 'Состояние',
            'filter' => \yii\helpers\ArrayHelper::map(\forma\modules\selling\records\state\State::find()->where(['user_id' => Yii::$app->user->id])->all(), 'name', 'name'),
            'vAlign' => 'middle',
            'width' => '210px',
            'editableOptions' => function ($model, $key, $index) {
                return [
                    'header' => ' состояние',
                    'size' => 'md',
                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    'data' => \yii\helpers\ArrayHelper::map(\forma\modules\selling\records\state\State::find()->where(['user_id' => Yii::$app->user->id])->all(), 'name', 'name'),
                    'options' => ['value' => isset($model->toState) ? $model->toState->name : ''],
                ];
            },
            'contentOptions' => ['class' => 'no-load'],

        ],
        [
            'attribute' => 'sumPurchaseСost',
            'label' => 'Сумма закупки',
            'value' => 'sumPurchaseСost',
            'pageSummary' => true,
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'format' => ['decimal', 2],
        ],
        [
            'attribute' => 'sumСost',
            'label' => 'Сумма продажи',
            'value' => 'sumСost',
            'pageSummary' => true,
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'format' => ['decimal', 2],
        ],
        [
            'attribute' => 'markup',
            'label' => 'Наценка',
            'value' => 'markup',
            'pageSummary' => true,
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'format' => ['decimal', 2],
        ]
    ];
    $gridColumnsExport = [
        [
            'label' => 'Код продажи',
            'value' => 'id',
        ],
        [
            'label' => 'Клиент',
            'value' => 'customerName',
        ],
        [
            'label' => 'Номер',
            'value' => 'customerPhone',
        ],
        [
            'label' => 'Место',
            'value' => 'warehouseName',
        ],
        [
            'label' => 'Состояние',
            'value' => 'stateName',
        ],
        [
            'label' => 'Название товара',
            'value' => 'productName',
        ],
        [
            'label' => 'Цена продажи за 1 шт.',
            'value' => 'cost',
        ],
        [
            'label' => 'Количество',
            'value' => 'quantity',
        ],
        [
            'label' => 'Сумма',
            'value' => 'sum',
        ],

    ];
    ?>

    <?php
    //dd($dataProvider);
    $exportMenu = ExportMenu::widget([
        'dataProvider' => $exportprovider,
        'columns' => $gridColumnsExport,
        'target' => '_blank',
        'fontAwesome' => true,
        'exportConfig' => [
            ExportMenu :: FORMAT_CSV => false,
            ExportMenu :: FORMAT_HTML => false,
            ExportMenu :: FORMAT_PDF=> false,
        ],
        'onRenderSheet' => function ($sheet, $widget) {
            $sheet->setTitle('Продажа');
        }
    ]);
    echo GridView::widget([
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,

        'export' => [
            'fontAwesome' => false,
        ],
        'columns' => $gridColumns,   // check the configuration for grid columns by clicking button above
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'showPageSummary' => true, // table page summary floats when you scroll
        'showFooter' => false,     // disable floating of table footer
        'headerRowOptions' => ['style' => 'top:50px', 'class' => 'kv-table-header'], // this is set only when `responsive` is `false` to offset the header from top of page
        'toolbar' => [
            [
                'content' => Html::button('<i class="glyphicon glyphicon-trash"></i> Удалить', [
                    'type' => 'button',
                    'class' => 'btn btn-danger forma_light_orange',
                    'onclick' => '$("#grid")
                        .groupOperation("' . \yii\helpers\Url::to(['/selling/super-selling/delete-selection']) . '", {
                            message: "Вы уверены, что хотите удалить выбранные элементы?"
                        });
                    ',
                ]),
            ],
            ['content' =>
                (isset($_GET['SellingSearch']) || isset($_GET['sort'])) ?
                    Html::a('Сбросить фильтры', ['index'], ['class' => 'btn btn-success']) : false
            ],
            $exportMenu,
            '{toggleData}',
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
        ],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
        'exportConfig' => true,
        'itemLabelSingle' => 'продажа',
        'itemLabelPlural' => 'продажи'
    ]);

    ?>

</div>