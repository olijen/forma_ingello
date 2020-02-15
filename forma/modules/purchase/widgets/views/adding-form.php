<?php

use forma\modules\purchase\records\purchase\StateInitial;
use yii\widgets\ActiveForm;
use forma\modules\overheadcost\records\OverheadCost;
use yii\helpers\Html;
use keygenqt\autocompleteAjax\AutocompleteAjax;

?>

<h3>Номенклатура</h3>
<?php if ($nomenclature->purchase->stateIs(new StateInitial())) : ?>

<div class="nomenclature-position">
    <h4>Добавить позицию</h4>

    <?php $form = ActiveForm::begin([
        'action' => '/purchase/adding-form/add-position?purchaseId=' . $nomenclature->purchase_id,
        'validationUrl' => ['/purchase/adding-form/validate', 'purchaseId' => $nomenclature->purchase_id],
        'options' => ['data-pjax' => true],
        'id' => 'purchase-nomenclature-form',
    ]); ?>

    <div class="form-group">
        <div class="col-md-12">
            <div class="form-group row">
                <div class="col-md-3">
                    <?= $form->field($nomenclature, 'product_id')->widget(AutocompleteAjax::className(), [
                        'multiple' => false,
                        'url' => [
                            '/product/product/search-by-supplier',
                            'purchase_id' => $nomenclature->purchase_id,
                        ],
                        'options' => [
                            'class' => 'form-control',
                            'placeholder' => 'Choose a product for next position',
                            'onfocus' => '$(this).select();',
                        ],
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($nomenclature, 'packUnitId')
                        ->dropDownList([], [
                            'id' => 'purchase-nomenclature-pack_unit-select',
                            'prompt' => '',
                        ])
                        ->label('Упаковка') ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($nomenclature, 'quantity', ['enableAjaxValidation' => true])->textInput()->label('Кол-во') ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($nomenclature, 'cost')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($nomenclature, 'tax')->textInput() ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <?= $form->field($overheadCost, 'sum')->textInput()
                        ->label('НР, сумма') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($overheadCost, 'type')->textInput()
                        ->dropDownList(OverheadCost::getTypes(), ['prompt' => ''])
                        ->label('НР, тип') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($overheadCost, 'comment')->textInput()
                        ->label('НР, коммент') ?>
                </div>
                <div class="col-md-3">
                    <?= Html::submitButton('Добавить', [
                        'class' => 'btn btn-success form-control',
                        'style' => 'margin-top: 25px;'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$js = <<<JS

$(function() {
    var ProductAutocomplete = (function() {
        var autocompleteInput = $('.operation-nomenclature .ui-autocomplete-input');
        var productIdInput = $('input[name="PurchaseProduct[product_id]"]');
        var productId = null;
        var originalId = null;
        
        var getProductId = function() {
            return productId;
        };
        
        var setOriginalId = function(id) {
            originalId = id;
        };
        
        var getOriginalId = function() {
            return originalId;
        };
        
        var setProductId = function(id) {
            productId = '' + id;
            productIdInput.val(id);
        };
        
        var setLabel = function(label) {
            setTimeout(function() {
                autocompleteInput.val(label);
            }, 500);
        };
        
        var select = function(event, ui) {
            if (ui.item === undefined) {
                return false;
            }
            
            setProductId(ui.item.id);
            setOriginalId(ui.item.originalId); // ?
            setLabel(ui.item.originalName);
            ProductPackUnitInput.setPackUnitId(ui.item.packUnitId);
            
            ProductPackUnitInput.refresh();
        };
        
        return {
            select: select,
            getProductId: getProductId,
            setProductId: setProductId,
            getOriginalId: getOriginalId
        };
    })();
    
    var ProductPackUnitInput = (function() {
        var select = $('#purchase-nomenclature-pack_unit-select');
        var packUnitId = null;
        
        var setPackUnitId = function(id) {
            packUnitId = id;
        };
        
        var fill = function(response) {
            if (response.success !== true) {
                return false;
            }
            
            select.empty();
            
            select.append('<option>');
        
            $.each(response.data, function(key, value) {
                select.append($('<option>', {
                    value: value.pack_unit_id,
                    text : value.name + ' (' + value.bottles_quantity + ' pc.)',
                    'data-product_id': value.product_id
                }));
            });
           
            select.val(packUnitId);
        };
        
        var refresh = function(packUnitId) {
            var productId = ProductAutocomplete.getProductId();
            if (!productId) {
                return false;
            }
            
            $.ajax({
                url: '/product/product/get-pack-units',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    productId: productId
                }
            }).done(fill);
        };
        
        var change = function(event) {
            var optionSelected = $('option:selected', this);
            var productId = optionSelected.val() ?
                optionSelected.attr('data-product_id') : ProductAutocomplete.getOriginalId();
            
            ProductAutocomplete.setProductId(productId);
        };
        
        return {
            refresh: refresh,
            setPackUnitId: setPackUnitId,
            change: change
        };
    })();
    
    var NomenclatureForm = (function() {
        var form = $('#purchase-nomenclature-form');
        
        var reset = function(event) {
            $.pjax.reload({container: '#nomenclature-pjax'});
            form.trigger('reset');
        };
        
        var validate = function(validation) {
            form.yiiActiveForm('updateMessages', validation, true);
        };
        
        var handle = function(response) {
            if (response.success !== true) {
                validate(response.validation);
            } else {
                reset();
            }
        };
        
        var send = function(event) {
            event.preventDefault();
            var params = form.serialize() + '&' + $.param({save: true});
            $.post(form.attr('action'), params).done(handle);
        };
        
        return {
            send: send
        };
    })();
    
    $('.operation-nomenclature .ui-autocomplete-input').autocomplete({
        select: ProductAutocomplete.select
    });
    
    $('#purchase-nomenclature-form').submit(NomenclatureForm.send);
    $('#purchase-nomenclature-pack_unit-select').change(ProductPackUnitInput.change);
});

JS;

$this->registerJs($js);

?>

<?php endif ?>
