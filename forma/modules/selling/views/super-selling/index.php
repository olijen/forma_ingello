<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;
use forma\components\ActiveRecordHelper;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\superselling\SellingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';
$this->params['breadcrumbs'][] = $this->title;
$warehouseIsVisible = \forma\modules\warehouse\records\Warehouse::find()
    ->joinWith('warehouseUsers')->where(['warehouse_user.user_id' => Yii::$app->user->id])
    ->select(['warehouse.id'])->all();
?>
<div class="selling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $gridColumns = [
        /*[
            'class' => 'kartik\grid\CheckboxColumn',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'pageSummary' => '<small>(amounts in $)</small>',
            //'pageSummaryOptions' => ['colspan' => 3, 'data-colspan-dir' => 'rtl']
        ],*/
        ['class' => 'kartik\grid\CheckboxColumn'],
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            // uncomment below and comment detail if you need to render via ajax
            // 'detailUrl' => Url::to(['/site/book-details']),
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_search', ['model' => $model]);
            },
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'customerName',
            'label' => 'Клиент',

            'filter' => \yii\helpers\ArrayHelper::map(\forma\modules\customer\records\Customer::find()->all(), 'name', 'name'),
            'value' => 'customer.name',
            //'pageSummary' => 'Total',
            'vAlign' => 'middle',
            'width' => '210px',
            'editableOptions' => function ($model, $key, $index) {
                return [
                    'header' => ' клиента',
                    'size' => 'md',
                    'options' => [
                        'value' => $model->customer->name,
                        'name' => 'SellingSearch[name]'
                    ],
                    /*'format' => \kartik\editable\Editable::FORMAT_BUTTON,
                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    'data'=>\yii\helpers\ArrayHelper::map(\forma\modules\customer\records\Customer::find()->all(), 'name', 'name'),*/

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
                        'value' => $model->customer->chief_phone,
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

            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\forma\modules\warehouse\records\Warehouse::find()->all(), 'name', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => [
                'placeholder' => 'Выбрать склад...',
                'value' => isset($_GET['SellingSearch[warehouseName]']) ? $_GET['SellingSearch[warehouseName]'] : null,

            ],
            /*'pluginEvents' => [
                "select2:select" => "function() { // function to make ajax call here }",
            ],*/

            'format' => 'raw'
        ],
    ];
    ?>


    <?php
    echo GridView::widget([
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'columns' => $gridColumns,   // check the configuration for grid columns by clicking button above
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'floatHeader' => true,      // table header floats when you scroll
        'showPageSummary' => true, // table page summary floats when you scroll
        'showFooter' => false,     // disable floating of table footer
        'headerRowOptions' => ['style' => 'top:50px', 'class' => 'kv-table-header'], // this is set only when `responsive` is `false` to offset the header from top of page
        'toolbar' => [
            [
                'content' =>
                    Html::button('<i class="fas fa-plus"></i>', [
                        'class' => 'btn btn-success',
                        'title' => 'Создать',
                        'onclick' => 'alert("Добавить продажу?");'
                    ]) . ' ' .
                    Html::a('<i class="fas fa-redo"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title' => 'Сбросить фильтр',
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        // parameters from the demo form
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


    <!--    --><?php /*BoxWidget::end();*/ ?>


</div>