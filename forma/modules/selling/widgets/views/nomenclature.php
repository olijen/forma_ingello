<?php

use forma\modules\core\components\LinkHelper;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\selling\StateDone;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use forma\modules\warehouse\services\RemainsService;
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
use yii\widgets\ActiveField;

/**
 * @var SellingProduct $unit
 * @var Selling $selling
 * @var ActiveDataProvider $dataProvider
 * @var float $sumTotal
 */
if(isset($unit->selling->warehouse)){
    $warehouseProducts = RemainsService::searchByWarehouse($unit->selling->warehouse->id, '');
}

?>

<?php Pjax::begin([
    'id' => 'selling-nomenclature-pjax',
    'enablePushState' => false,
    'enableReplaceState' => false,
]) ?>

<div class="bs-example">
    <div class="detached-block-example" style="margin-bottom: 10px">Товар
        <?php if (!isset($_GET['selling_token'])) { ?>
            <?php echo LinkHelper::replaceUrlOnButton(" {{" . Url::to('/warehouse/warehouse' . "||" . " Список складов" . "}}"), 'th'); ?>
            <?php echo LinkHelper::replaceUrlOnButton(" {{" . Url::to('/product/product' . "||" . " Список товаров" . "}}"), 'cube'); ?>
        <?php } ?>
    </div>

    <div class="operation-nomenclature" data-warehouse-id="<?= $unit->selling->warehouse_id ?>">
        <?php
        if (empty($warehouseProducts)) {
            echo "<div class='row'>
                <div class='col-md-12'>
                    <p style='color: red; margin-top: 15px'>На вашем складе нет товаров! Перейдите <a href='/purchase/form/index'
                                                                                                      onclick='location.href=/purchase/form/index'>по
                            ссылке</a> и добавьте товары в закупку.</p>
                </div>
            </div>";
        }
        ?>
        <?php if (stristr(Yii::$app->request->pathInfo, "selling") != false || !empty($selling->sellingProducts)) { ?>

            <?php if (!$unit->selling->stateIs(new StateDone())): ?>
                <?php if (!empty($warehouseProducts)) { ?>

                    <div class="row">

                        <?php $form = ActiveForm::begin([
                            'id' => 'contact-form',
                            'method' => 'post',
                            'enableAjaxValidation' => true,
                            'action' => Url::to(['/selling/nomenclature/add-position']),
                            'validationUrl' => Url::to(['/selling/nomenclature/validate']),
                            'options' => ['data-pjax' => '1'],
                        ]); ?>

                        <?= $form->field($unit, 'selling_id')->hiddenInput()->label(false) ?>
                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>""
                        value="<?= Yii::$app->request->getCsrfToken(); ?>"/>
                        <?php if (Yii::$app->user->isGuest) { ?><input type="hidden" name="selling_token"
                                                                       value="<?= isset($_GET['selling_token']) ? $_GET['selling_token'] : $_COOKIE['selling_token']; ?>" /> <?php } ?>

                        <div class="col-md-3">
                            <?php // todo: более правильный способ передачи данных вместо дозаписи гет запроса?>
                            <?= $form->field($unit, 'product_id')->widget(AutoComplete::className(), [
                                'url' => Url::to([
                                    '/warehouse/warehouse-product/search-for-selling',
                                    'sellingId' => $unit->selling_id,
                                    'selling_token' => $_GET['selling_token'] ?? $_COOKIE['selling_token'] ?? null
                                ]),

                            ]);

                            ?>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group field-sellingproduct-currency_name required">
                                <label class="control-label" for="sellingproduct-currency_name">Валюта</label>
                                <input type="text" id="sellingproduct-currency_name" class="form-control"
                                       name="currency-name" aria-required="true" readonly>
                                <div class="help-block"></div>
                            </div>
                            <?= $form->field($unit, 'currency_id')
                                ->hiddenInput()->label(false);

                            ?>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group field-sellingproduct-purchase_cost">
                                <label class="control-label" for="sellingproduct-purchase_cost">Ц.З.</label>
                                <input type="text" id="sellingproduct-purchase_cost" class="form-control"
                                       name="purchase-cost" readonly>
                                <div class="help-block"></div>
                            </div>
                            <?= $form->field($unit, 'purchase_cost')
                                ->hiddenInput()->label(false);

                            ?>
                        </div>

                        <div class="col-md-2">
                            <?= $form->field($unit, 'quantity', ['enableAjaxValidation' => true])->textInput(['class' => 'form-control change-cost'])
                                ->label('К-во <span id="position-available-qty"></span>') ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($unit, 'cost_type')->dropDownList(SellingProduct::getCostTypes(), ['value' => (isset(SellingProduct::getCostTypes()[0]) ? SellingProduct::getCostTypes()[0] : null), 'class' => 'form-control change-cost']) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($unit, 'cost')->textInput()->label('Стоимость за 1 шт.') ?>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Сумма</label>
                                <input type="text" id="sellingproduct-sum" class="form-control"
                                       name="sellingproduct-sum" readonly>
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i>', [
                                'class' => 'btn btn-success form-control no-loader',
                                'style' => 'margin-top: 25px;',
                            ]) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <script>
                        $('#sellingproduct-cost').change(function () {
                            let cost = $('#sellingproduct-cost').val();
                            let quantity = $('#sellingproduct-quantity').val();
                            $('#sellingproduct-sum').val(cost * quantity);
                        })
                        $('#sellingproduct-quantity').change(function () {
                            let cost = $('#sellingproduct-cost').val();
                            let quantity = $('#sellingproduct-quantity').val();
                            $('#sellingproduct-sum').val(cost * quantity);
                        })
                        $('#sellingproduct-cost_type').change(function () {
                            let $productId = $('#sellingproduct-product_id').val();
                            let $costType = $('#sellingproduct-cost_type').val();
                            let quantity = $('#sellingproduct-quantity').val();
                            $.post("/selling/form/change-selling-product-cost", {
                                costType: $costType,
                                productId: $productId,
                                sellingId: <?= $unit->selling_id ?>,
                            }, function (data) {
                                $('#sellingproduct-cost').val(data);
                                $('#sellingproduct-sum').val(data * quantity);
                            });

                        })
                        $('#sellingproduct-product_id').change(function () {
                            let $productId = $('#sellingproduct-product_id').val();
                            $.post("/selling/form/change-selling-product-purchase-cost", {
                                productId: $productId,
                                sellingId: <?= $unit->selling_id ?>,
                            }).done(function (data) {
                                $('#sellingproduct-purchase_cost').val(data.purchaseCost);
                                $('#sellingproduct-sum').val(data.cost);
                                $('#sellingproduct-cost').val(data.cost);
                                $('#sellingproduct-quantity').val(1);
                            });

                        })
                    </script>
                <?php } endif;
        } ?>
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
                        'attribute' => 'quantity',
                        'reloadPjax' => true,
                    ],
                    [
                        'attribute' => 'currency_id',
                        'inputType' => DataColumn::INPUT_SELECT,
                        'optionsList' => Currency::getList(),
                        'optionsListPrompt' => false,
                        'updateUrl' => Url::to(['/selling/nomenclature/change-currency']),
                        'label' => 'Валюта',
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
                                    '/selling/nomenclature/delete-position?id=' . $model->id . '&selling_token=' . ($_GET['selling_token'] ?? $_COOKIE['selling_token'] ?? null), [
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

                Yii::debug(Currency::getList());

                ?>
            </div>
        </div>
    </div>
</div>

<div class="bs-example">
    <div class="detached-block-example" style="margin-bottom: 10px">Товар
    </div>

    <?= TotalSumView::widget(['selling' => $unit->selling]) ?>
</div>

</div>

<?php Pjax::end(); ?>
