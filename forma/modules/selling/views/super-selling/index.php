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
        background: #EEFCFF;
        background-color: #F1F4FB;
    }

    .no-hover:hover {
        background: #EEFCFF;
    }
</style>
<div class="selling-index">
    <a href="/selling/form/index" class="btn btn-success forma_blue"> <i class="fa fa-plus"></i> Новая продажа </a>
    <hr>
    <input id="import-file-input" type="file" style="display: none;" class="kv-loader">
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
                    return \yii\helpers\Url::to(['/selling/super-selling/delete', 'id' => $model->id]);
                }
            }
        ],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detailRowCssClass' => 'no-hover',
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_search', ['model' => $model]);
            },

        ],
        'id',
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
            'label' => 'Телефон',
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
            'filter' => \yii\helpers\ArrayHelper::map(\forma\modules\selling\records\state\State::find()->where(['user_id' => Yii::$app->user->id])->all(), 'id', 'name'),
            'vAlign' => 'middle',
            'width' => '210px',

            'editableOptions' => function ($model, $key, $index) {
                return [
                    'header' => ' состояние',
                    'size' => 'md',
                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    'data' => \yii\helpers\ArrayHelper::map(\forma\modules\selling\records\state\State::find()->where(['user_id' => Yii::$app->user->id])->all(), 'id', 'name'),
                    'options' => ['value' => isset($model->toState) ? $model->toState->id : ''],

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
            'value' => 'customer.name',
        ],
        [
            'label' => 'Номер',
            'value' => 'customer.chief_phone',
        ],
        [
            'label' => 'Место',
            'value' => 'warehouse.name',
        ],
        [
            'label' => 'Состояние',
            'value' => 'toState.name',
        ],
        [
            'label' => 'Товар',
            'value' => function($selling){
                $products ="";
                foreach ($selling->sellingProducts as $sellingProduct){
                    $productName = (isset($sellingProduct->product->name)?$sellingProduct->product->name:'не задано');
                    $products .= "\n $productName";
                }
                return  $products;
            },
            'format' => 'raw',
            'width'=>'300'
        ],
        [
            'label' => 'Цена продажи за 1 шт.',
            'value' => function ($selling) {
                $products = "";
                foreach ($selling->sellingProducts as $sellingProduct) {
                    $productSellingCost = (isset($sellingProduct->cost)?$sellingProduct->cost:0);
                    $products .= "\n$productSellingCost";
                }
                return $products;
            },
        ],
        [
            'label' => 'Количество',
            'value' => function ($selling) {
                $products = "";
                foreach ($selling->sellingProducts as $sellingProduct) {
                    $productSellingQuantity = (isset($sellingProduct->quantity)?$sellingProduct->quantity:0);
                    $products .= "\n$productSellingQuantity";
                }
                return $products;
            },
        ],
        [
            'label' => 'Сумма',
            'value' => function ($selling) {
                $products = 0;
                foreach ($selling->sellingProducts as $sellingProduct) {
                    $products +=  (isset($sellingProduct->cost)?$sellingProduct->quantity*$sellingProduct->cost:0);
                }
                return $products;
            },
        ]
    ];

    ?>

    <?php
    $exportMenu = ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumnsExport,
        'filename' => 'Продажи' . date('d-m-Y h-m'),
        'showColumnSelector' => false,
        'exportConfig' => [
            ExportMenu :: FORMAT_CSV => false,
            ExportMenu :: FORMAT_HTML => false,
            ExportMenu :: FORMAT_TEXT=> false,
            ExportMenu :: FORMAT_PDF=> false,
        ],
        //размер полей
        'onRenderSheet' => function ($sheet, $widget) {
            for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
                $sheet->getRowDimension($i)->setRowHeight(strlen($sheet->getCell('F' . $i)->getValue()) / 2);
            }
            $maxWidth = 60;
            $sheet->calculateColumnWidths();
            foreach ($sheet->getColumnDimensions() as $colDim) {
                if (!$colDim->getAutoSize()) {
                    continue;
                }
                $colWidth = $colDim->getWidth();
                if ($colWidth > $maxWidth) {
                    $colDim->setAutoSize(false);
                    $colDim->setWidth($maxWidth);
                }
            }
            $sheet->setTitle('Продажа');
        }
    ]);
    echo GridView::widget([
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,

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
            [
                'content' => \yii\bootstrap\ButtonDropdown::widget([
                    'label' => '<i class="glyphicon glyphicon-import"></i>',
                    'encodeLabel' => false,
                    'dropdown' => [
                        'items' => [
                            ['label' => 'Импорт', 'options' => [
                                'onclick' => '$("#import-file-input").trigger("click");',
                                'style' => 'cursor: pointer;',
                            ]],
                            [
                                'label' => 'Пример',
                                'options' => [
                                    'onclick' => 'location.href = "/selling/super-selling/download-example-file"',
                                    'style' => 'cursor: pointer;',
                                ],
                            ],
                        ],
                    ],
                    'options' => ['class' => 'btn btn-default forma_light_orange'],
                ]),
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
        'exportConfig' =>false,
        'itemLabelSingle' => 'продажа',
        'itemLabelPlural' => 'продажи'
    ]);

    ?>

</div>
<?php
$js = <<< JS
     function showLoaderSellingImport() {
        document.getElementById("loader").style.display = "block";
        $('body').css('pointer-events', 'none');
        setTimeout(() => {
            hideLoaderSellingImport();
            }, 10000);
     }

     function hideLoaderSellingImport() {
        document.getElementById("loader").style.display = "none";
        $('body').css('pointer-events', 'all');
    }
    
    $('#import-file-input').change(function () {
        let sendUrl = '/selling/super-selling/import-file';
        let fd = new FormData();
        fd.append('csv', this.files[0]);
        showLoaderSellingImport();
        $.ajax({
            url: sendUrl,
            type: 'POST',
            data: fd,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false
        }).done(function (response) {
                response = JSON.parse(response);
                if (response.msg !== "") {
                    krajeeDialog.alert('Созданы клиенты и продажи: '+ response.msg);
                    $.pjax({container: '#grid-pjax'})
                } else {
                    krajeeDialog.alert('Созданы клиенты и продажи');
                    $.pjax({container: '#grid-pjax'})
                }

                $('#import-file-input').val('');
            }).fail(function () {
                $('#import-file-input').val('');
            });
    });
    
JS;
$this->registerJs($js);

?>