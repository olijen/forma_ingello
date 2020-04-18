<?php

use forma\modules\selling\records\selling\StateDone;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\extensions\editable\GridView;
use forma\extensions\editable\DataColumn;
use yii\widgets\ActiveForm;
use forma\modules\core\widgets\AutoComplete;
use forma\modules\selling\records\selling\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;
use forma\modules\product\records\Currency;
use forma\modules\selling\widgets\TotalSumView;

/**
 * @var SellingProduct $unit
 * @var ActiveDataProvider $dataProvider
 * @var float $sumTotal
 */

?>

<?php Pjax::begin([
    'id' => 'selling-nomenclature-pjax',
    'enablePushState' => false,
    'enableReplaceState' => false,
]) ?>

<?php DetachedBlock::begin([
    'example' => 'Товар',
]); ?>

<div class="operation-nomenclature" data-warehouse-id="<?= $unit->selling->warehouse_id ?>">

<?php if (!$unit->selling->stateIs(new StateDone())): ?>
<div class="row">

    <?php $form = ActiveForm::begin([
        'action' =>  Url::to(['/selling/nomenclature/add-position']),
        'validationUrl' => Url::to(['/selling/nomenclature/validate']),
        'options' => ['data-pjax' => '1'],
    ]); ?>

    <?= $form->field($unit, 'selling_id')->hiddenInput()->label(false) ?>

    <div class="col-md-3">
        <?= $form->field($unit, 'product_id')->widget(AutoComplete::className(), [
            'url' => Url::to([
                '/warehouse/warehouse-product/search-for-selling',
                'sellingId' => $unit->selling_id,
            ]),
        ]) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($unit, 'currency_id')->dropDownList(Currency::getList())
            ->label('Валюта') ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($unit, 'quantity', ['enableAjaxValidation' => true])->textInput()
            ->label('К-во <span id="position-available-qty"></span>') ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($unit, 'cost_type')->dropDownList(SellingProduct::getCostTypes(), ['prompt' => '']) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($unit, 'cost')->textInput() ?>
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
            'attribute' => 'pack_unit_id',
            'label' => 'Упаковка',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsListCallback' => function($model) {
                /* @var SellingProduct $model */
                /* @var \forma\modules\product\Module $module */
                $module = Yii::$app->getModule('product');
                return $module->getPacksUnits($model->product);
            },
            'updateUrl' => Url::to(['/selling/nomenclature/change-pack']),
            'reloadPjax' => true,
        ],
        [
            'attribute' =>  'currency_id',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => Currency::getList(),
            'optionsListPrompt' => false,
            'updateUrl' => Url::to(['/selling/nomenclature/change-currency']),
            'label' => 'Валюта',
            'reloadPjax' => true,
        ],
        [
            'attribute' => 'quantity',
            'reloadPjax' => true,
        ],
        [
            'attribute' => 'cost_type',
            'inputType' => DataColumn::INPUT_SELECT,
            'optionsList' => SellingProduct::getCostTypes(),
        ],
        [
            'attribute' => 'cost',
            'reloadPjax' => true,
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'contentOptions' => ['class' => 'action-column'],
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                        '/selling/nomenclature/delete-position?id='.$model->id, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '1',
                        ]);
                },
            ],
        ],
    ];

    $gridIsEditable = !$unit->selling->stateIs(new StateDone());

    echo GridView::widget([
        'id' => 'selling-nomenclature-grid',
        'isEditable' => $gridIsEditable,
        'updateUrl' => Url::to(['/selling/nomenclature/editCell']),
        'pjaxContainer' => 'selling-nomenclature-pjax',
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'responsiveWrap' => false,
    ]);

    ?>
    </div>
</div>

<?php DetachedBlock::end(); ?>

<?php DetachedBlock::begin([
    'example' => 'Итого',
]); ?>

<?= TotalSumView::widget(['selling' => $unit->selling]) ?>

<?php DetachedBlock::end(); ?>

</div>

<?php Pjax::end(); ?>
