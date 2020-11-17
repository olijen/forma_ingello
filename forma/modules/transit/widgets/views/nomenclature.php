<?php

use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\modules\overheadcost\records\OverheadCost;
use \forma\modules\transit\records\transitproduct\TransitProduct;
use forma\extensions\editable\GridView;
use forma\extensions\editable\DataColumn;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\core\widgets\AutoComplete;
use forma\modules\transit\records\transit\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;
use forma\modules\product\records\Currency;
use forma\modules\transit\widgets\TotalSumView;

/**
 * @var $unit TransitProduct
 * @var $dataProvider ActiveDataProvider
 * @var $overheadCost OverheadCost
 * @var $sumTotal integer
 * @var $transitOverheadCosts ActiveDataProvider
 */

Pjax::begin([
    'id' => 'transit-nomenclature-pjax',
    'enablePushState' => false,
    'enableReplaceState' => false,
]);

?>

<?php DetachedBlock::begin([
    'header' => 'Товар',
    'example' => 'Введите данные номенклатуры',
]); ?>

<div class="operation-nomenclature" data-warehouse-id="<?= $unit->transit->from_warehouse_id ?>">

<?php if (!$unit->transit->stateIs(new StateConfirm())): ?>
<div class="row">
    <?php $form = ActiveForm::begin([
        'action' =>  Url::to(['/transit/nomenclature/add-position']),
        'validationUrl' => Url::to(['/transit/nomenclature/validate']),
        'options' => ['data-pjax' => '1'],
    ]); ?>

    <?= $form->field($unit, 'transit_id')->hiddenInput()->label(false) ?>

    <div class="col-md-3">
        <?= $form->field($unit, 'product_id')->widget(\kartik\select2\Select2::className(), [
            'data' => \forma\modules\product\records\Product::getList(),
            'options' => ['placeholder' => 'Выберите товар ...'],
        ]) ?>
    </div>
    <div class="col-md-1">
        <?= $form->field($unit, 'quantity', ['enableAjaxValidation' => true])->textInput()
            ->label('К-во <span id="position-available-qty"></span>') ?>
    </div>
    <div class="col-md-1">
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
            'isEditable' => false,
            'label' => 'Валюта закупки',
            'value' => function ($model) {
                $productOnWarehouse = \forma\modules\warehouse\records\WarehouseProduct::find()
                    ->where(['warehouse_id' => $model->transit->from_warehouse_id])
                    ->andWhere(['product_id' => $model->product_id])
                    ->one();

                if ($productOnWarehouse) {
                    return $productOnWarehouse->currency->code;
                }
                
                $productOnWarehouse = \forma\modules\warehouse\records\WarehouseProduct::find()
                    ->where(['warehouse_id' => $model->transit->to_warehouse_id])
                    ->andWhere(['product_id' => $model->product_id])
                    ->one();

                return $productOnWarehouse->currency->code ?? null;
            },
        ],
        [
            'attribute' => 'pack_unit_id',
            'label' => 'Упаковка',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsListCallback' => function($model) {
                /* @var TransitProduct $model */
                /* @var \forma\modules\product\Module $module */
                $module = Yii::$app->getModule('product');
                return $module->getPacksUnits($model->product);
            },
            'updateUrl' => Url::to(['/transit/nomenclature/change-pack']),
            'reloadPjax' => true,
        ],
        'quantity',
        [
            'attribute' => 'overheadCost.sum',
            'updateUrl' => Url::to(['/transit/nomenclature/editOverheadCostCell']),
            'reloadPjax' => true,
            'label' => 'Н.Р, сумма',
        ],
        [
            'attribute' => 'overheadCost.currency_id',
            'updateUrl' => Url::to(['/transit/nomenclature/editOverheadCostCell']),
            'reloadPjax' => true,
            'label' => 'Н.Р, Валюта',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => Currency::getList(),
            'optionsListPrompt' => false,
        ],
        [
            'attribute' =>  'overheadCost.type',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => OverheadCost::getTypes(),
            'updateUrl' => Url::to(['/transit/nomenclature/editOverheadCostCell']),
            'label' => 'Н.Р, тип',
        ],
        [
            'attribute' => 'overheadCost.comment',
            'updateUrl' => Url::to(['/transit/nomenclature/editOverheadCostCell']),
            'label' => 'Н.Р, комментарий',
        ],
        [
            'label' => 'Общий расход',
            'value' => function($model) {
                return OverheadCostService::getByNomenclatureUnit($model);
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'contentOptions' => ['class' => 'action-column'],
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                        '/transit/nomenclature/delete-position?id='.$model->id, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '1',
                        ]);
                },
            ],
        ],
    ];

    $gridIsEditable = !$unit->transit->stateIs(new StateConfirm());

    echo GridView::widget([
        'id' => 'transit-nomenclature-grid',
        'isEditable' => $gridIsEditable,
        'updateUrl' => Url::to(['/transit/nomenclature/editCell']),
        'pjaxContainer' => 'transit-nomenclature-pjax',
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'responsiveWrap' => false,
    ]); ?>
    </div>
</div>

<?php DetachedBlock::end(); ?>

<?php DetachedBlock::begin([
    'header' => 'Накладные расходы',
    'example' => 'Введите данные по накладным расходам',
]); ?>

<?php if (!$unit->transit->stateIs(new StateConfirm())): ?>
<div class="row">
    <?php $form = ActiveForm::begin([
        'action' => '/transit/nomenclature/add-overhead-cost?id=' . $unit->transit_id,
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
                        '/transit/nomenclature/delete-overhead-cost?id=' . $model->id .
                        '&transitId=' . $unit->transit_id, [
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

    $gridIsEditable = !$unit->transit->stateIs(new StateConfirm());

    echo GridView::widget([
        'id' => 'transitoverhead-cost-grid',
        'isEditable' => $gridIsEditable,
        'enableExport' => false,
        'updateUrl' => Url::to(['/transit/nomenclature/editOverheadCostCell']),
        'pjaxContainer' => 'transit-nomenclature-pjax',
        'dataProvider' => $transitOverheadCosts,
        'columns' => $columns,
        'responsiveWrap' => false,
    ]); ?>
    </div>
</div>

<?php DetachedBlock::end(); ?>

    <?php DetachedBlock::begin([
        'header' => 'Итого',
        'example' => 'Итоговые данные номенклатуры',
    ]); ?>

<?= TotalSumView::widget(['transit' => $unit->transit]) ?>

<?php DetachedBlock::end(); ?>

</div>

<?php Pjax::end(); ?>
