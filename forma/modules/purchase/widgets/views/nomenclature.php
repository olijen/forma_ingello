<?php

use forma\modules\product\services\ProductService;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use forma\modules\overheadcost\records\OverheadCost;
use forma\extensions\editable\GridView;
use forma\extensions\editable\DataColumn;
use yii\helpers\Url;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\purchase\records\purchase\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;
use forma\modules\purchase\records\purchase\StateInitial;
use forma\modules\product\records\TaxRate;
use forma\modules\product\services\TaxRateService;
use forma\modules\product\records\Currency;
use forma\modules\purchase\widgets\TotalSumView;

/**
 * @var PurchaseProduct $unit
 * @var ActiveDataProvider $dataProvider
 * @var OverheadCost $overheadCost
 */

Pjax::begin([
    'id' => 'purchase-nomenclature-pjax',
    'enablePushState' => false,
    'enableReplaceState' => false,
]);

?>

<?php DetachedBlock::begin([
    'header' => 'Товар',
    'example' => 'Введите данные номенклатуры',
]); ?>

<div class="operation-nomenclature" xmlns="http://www.w3.org/1999/html">

<?php if (!$unit->purchase->stateIs(new StateConfirm())): ?>
<div class="row">

    <?php $form = ActiveForm::begin([
        'action' =>  Url::to(['/purchase/nomenclature/add-position']),
        'options' => ['data-pjax' => '1'],
    ]); ?>

    <?= $form->field($unit, 'purchase_id')->hiddenInput()->label(false) ?>

    <div class="col-md-3">
        <?php
        echo $form->field($unit, 'product_id')->widget(Select2::classname(), [
            'data' => \forma\modules\product\records\Product::getList(),
            'options' => ['placeholder' => 'Поиск в базе'],
            'pluginOptions' => ['allowClear' => true],
        ])->label('') ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($unit, 'currency_id')->dropDownList(Currency::getList())
            ->label('Валюта') ?>
    </div>
    <div class="col-md-1">
        <?= $form->field($unit, 'quantity')->textInput()->label('Кол-во') ?>
    </div>
    <div class="col-md-1">
        <?= $form->field($unit, 'cost')->textInput() ?>
    </div>
    <div class="col-md-1">
        <?= $form->field($unit, 'tax_rate_id')->dropDownList(TaxRate::getList(), ['prompt'=> ''])
            ->label('Налог (%)') ?>
    </div>
    <div class="col-md-1">
        <?= $form->field($overheadCost, 'sum')->textInput()
            ->label('НР, сумма') ?>
    </div>
    <div class="col-md-1">
        <?= $form->field($overheadCost, 'type')->textInput()
            ->dropDownList(OverheadCost::getTypes(), ['prompt' => ''])
            ->label('НР, тип') ?>
    </div>
    <div class="col-md-1">
        <?= $form->field($overheadCost, 'comment')->textInput()
            ->label('НР, комментарий') ?>
    </div>
    <div class="col-md-1">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i>', [
            'class' => 'btn btn-success form-control no-loader',
            'style' => 'margin-top: 25px;',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">

    <?php

    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'product.name',
            'isEditable' => false,
            'label' => 'Товар',
        ],
        [
            'attribute' => 'pack_unit_id',
            'label' => 'Упаковка',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsListCallback' => function($model) {
                /* @var PurchaseProduct $model */
                /* @var \forma\modules\product\Module $module */
                $module = Yii::$app->getModule('product');
                return $module->getPacksUnits($model->product);
            },
            'updateUrl' => Url::to(['/purchase/nomenclature/change-pack']),
            'reloadPjax' => true,
        ],
        [
            'attribute' =>  'currency_id',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => Currency::getList(),
            'optionsListPrompt' => false,
            'updateUrl' => Url::to(['/purchase/nomenclature/change-currency']),
            'label' => 'Валюта',
            'reloadPjax' => true,
        ],
        [
            'attribute' =>  'quantity',
            'reloadPjax' => true,
        ],
        [
            'attribute' =>  'cost',
            'reloadPjax' => true,
        ],
        [
            'attribute' => 'tax_rate_id',
            'label' => 'Налог (%)',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => TaxRate::getList(),
            'reloadPjax' => true,
        ],
        [
            'attribute' => 'overheadCost.sum',
            'updateUrl' => Url::to(['/purchase/nomenclature/editOverheadCostCell']),
            'reloadPjax' => true,
            'label' => 'Н.Р, сумма',
        ],
        [
            'attribute' =>  'overheadCost.type',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => OverheadCost::getTypes(),
            'updateUrl' => Url::to(['/purchase/nomenclature/editOverheadCostCell']),
            'label' => 'Н.Р, тип',
        ],
        [
            'attribute' => 'overheadCost.comment',
            'updateUrl' => Url::to(['/purchase/nomenclature/editOverheadCostCell']),
            'label' => 'Н.Р, комментарий',
        ],
        [
            'label' => 'Общий Н.Р.',
            'value' => function($model) {
                return OverheadCostService::getByNomenclatureUnit($model);
            },
        ],
        [
            'label' => 'НДС',
            'value' => function($model) {
                return TaxRateService::getUnitTaxCost($model);
            },
        ],
    ];

    if (!$unit->purchase->stateIs(new StateInitial())) {
        $columns = array_merge($columns, [
            'prepayment',
        ]);
    }

    $columns = array_merge($columns, [
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'contentOptions' => ['class' => 'action-column'],
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                        '/purchase/nomenclature/delete-position?id='.$model->id, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '1',
                        ]);
                },
            ],
        ],
    ]);

    $gridIsEditable = !$unit->purchase->stateIs(new StateConfirm());

    echo GridView::widget([
        'id' => 'purchase-nomenclature-grid',
        'isEditable' => $gridIsEditable,
        'updateUrl' => Url::to(['/purchase/nomenclature/editCell']),
        'pjaxContainer' => 'purchase-nomenclature-pjax',
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'responsiveWrap' => false,
    ]);

    ?>

    </div>
</div>

<?php DetachedBlock::end(); ?>

<?php DetachedBlock::begin([
    'header' => 'Накладные расходы',
    'example' => 'Введите данные по накладным расходам',
]); ?>

<?php if (!$unit->purchase->stateIs(new StateConfirm())): ?>
<div class="row">
    <?php $form = ActiveForm::begin([
        'action' => '/purchase/nomenclature/add-overhead-cost?id=' . $unit->purchase_id,
        'options' => ['data-pjax' => '1'],
    ]); ?>

    <div class="col-md-2">
        <?= $form->field($overheadCost, 'sum')->textInput()
            ->label('НР, сумма') ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($overheadCost, 'currency_id')
            ->dropDownList(Currency::getList())
            ->label('НР, валюта') ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($overheadCost, 'type')->textInput()
            ->dropDownList(OverheadCost::getTypes(), ['prompt' => ''])
            ->label('НР, тип') ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($overheadCost, 'comment')->textInput()
            ->label('НР, комментарий') ?>
    </div>
    <div class="col-md-1">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i>', [
            'class' => 'btn btn-success form-control',
            'style' => 'margin-top: 25px;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">

    <?php

    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'sum',
            'label' => 'Н.Р, сумма',
            'reloadPjax' => true,
        ],
        [
            'attribute' =>  'currency_id',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => Currency::getList(),
            'optionsListPrompt' => false,
            'label' => 'Валюта',
            'reloadPjax' => true,
        ],
        [
            'attribute' => 'type',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => OverheadCost::getTypes(),
            'label' => 'Н.Р, тип',
        ],
        [
            'attribute' => 'comment',
            'label' => 'Н.Р, комментарий',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'delete' => function ($url, $model, $key) use($unit) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                        '/purchase/nomenclature/delete-overhead-cost?id=' . $model->id .
                        '&purchaseId=' . $unit->purchase_id, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '1',
                        ]);
                },
            ],
            'template' => '{delete}',
        ],
    ];

    $gridIsEditable = !$unit->purchase->stateIs(new StateConfirm());

    echo GridView::widget([
        'id' => 'purchaseoverhead-cost-grid',
        'isEditable' => $gridIsEditable,
        'enableExport' => false,
        'updateUrl' => Url::to(['/purchase/nomenclature/editOverheadCostCell']),
        'pjaxContainer' => 'purchase-nomenclature-pjax',
        'dataProvider' => $purchaseOverheadCosts,
        'columns' => $columns,
        'responsiveWrap' => false,
    ]);

    ?>

    </div>
</div>

<?php DetachedBlock::end(); ?>

<?php DetachedBlock::begin([
    'header' => 'Итого',
    'example' => 'Итоговые данные номенклатуры',
]); ?>

<?= TotalSumView::widget(['purchase' => $unit->purchase]) ?>

<?php DetachedBlock::end(); ?>

</div>

<?php Pjax::end(); ?>
