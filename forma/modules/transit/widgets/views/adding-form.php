<?php

use yii\widgets\ActiveForm;
use forma\modules\transit\records\transit\StateInitial;
use forma\modules\overheadcost\records\OverheadCost;
use yii\helpers\Url;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use yii\helpers\Html;

?>

<h3>Номенклатура</h3>
<?php if ($nomenclature->transit->stateIs(new StateInitial)): ?>
    <div class="nomenclature-position">

        <?php $form = ActiveForm::begin([
            'action' => Url::to(['/transit/adding-form/add-position?transitId=' . $nomenclature->transit_id,]),
            'validationUrl' => ['/transit/adding-form/validate', 'transitId' => $nomenclature->transit_id],
            'options' => [
                'data-pjax' => true,
                'data-transit-id' => $nomenclature->transit_id,
                'data-warehouse-id' => $nomenclature->transit->from_warehouse_id,
            ],
            'id' => 'transit-nomenclature-form',
        ]); ?>

        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-2">
                        <?= $form->field($nomenclature, 'product_id')->widget(AutocompleteAjax::className(), [
                            'multiple' => false,
                            'url' => [
                                '/warehouse/warehouse-product/search-for-transit',
                                'transit_id' => $nomenclature->transit_id,
                            ],
                            'options' => [
                                'class' => 'form-control',
                                'placeholder' => 'Choose a product for next position',
                                'onfocus' => '$(this).select();',
                            ],
                        ]) ?>
                    </div>
                    <div class="col-md-1">
                        <?= $form->field($nomenclature, 'packUnitId')
                            ->dropDownList([], [
                                'id' => 'transit-nomenclature-pack_unit-select',
                                'prompt' => '',
                            ])
                            ->label('Упаковка') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($nomenclature, 'quantity', ['enableAjaxValidation' => true])->textInput()
                            ->label('Кол-во <span id="transitproduct-quantity-available"></span>') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($overheadCost, 'sum')->textInput()
                            ->label('НР, сумма') ?>
                    </div>
                    <div class="col-md-1">
                        <?= $form->field($overheadCost, 'type')->textInput()
                            ->dropDownList(OverheadCost::getTypes(), ['prompt' => ''])
                            ->label('НР, тип') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($overheadCost, 'comment')->textInput()
                            ->label('НР, коммент') ?>
                    </div>
                    <div class="col-md-2">
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
        var productIdInput = $('input[name="TransitProduct[product_id]"]');
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
            setOriginalId(ui.item.originalId);
            setLabel(ui.item.originalName);
            ProductPackUnitInput.setPackUnitId(ui.item.packUnitId);
            
            ProductPackUnitInput.refresh();
            UnitQuantityInput.refresh();
        };
        
        return {
            select: select,
            getProductId: getProductId,
            setProductId: setProductId,
            getOriginalId: getOriginalId
        };
    })();
    
    var ProductPackUnitInput = (function() {
        var select = $('#transit-nomenclature-pack_unit-select');
        var packUnitId = null;
        
        var getWarehouseId = function() {
            return $('#transit-form').data('warehouse_id');
        };
        
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
                url: '/product/product/get-pack-units-on-warehouse',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    productId: productId,
                    warehouseId: getWarehouseId()
                }
            }).done(fill);
        };
        
        var change = function(event) {
            var optionSelected = $('option:selected', this);
            var productId = optionSelected.val() ?
                optionSelected.attr('data-product_id') : ProductAutocomplete.getOriginalId();
            
            ProductAutocomplete.setProductId(productId);
            UnitQuantityInput.refresh();
        };
        
        return {
            refresh: refresh,
            setPackUnitId: setPackUnitId,
            change: change
        };
    })();
    
    var UnitQuantityInput = (function() {
        var label = $('#transitproduct-quantity-available');
        var input = $('#transitproduct-quantity');
        
        var getWarehouseId = function() {
            return $('#transit-form').data('warehouse_id');
        };
        
        var resetLabel = function() {
            label.html('');
        };
        
        var fill = function(response) {
            if (response.success !== true) {
                return false;
            }
           
            label.html('<span class="not-set">(<= ' + response.available + ')</span>');
            if (input.val()) {
                nomenclatureForm.yiiActiveForm('validateAttribute', 'transitproduct-quantity');
            }
        };
        
        var refresh = function() {
            $.post('/product/product/check-available', {
               productId: ProductAutocomplete.getProductId(),
               warehouseId: getWarehouseId()
            }).done(fill);
        };
        
        return {
            refresh: refresh,
            resetLabel: resetLabel
        };
    })();
    
    var NomenclatureForm = (function() {
        var form = $('#transit-nomenclature-form');
        
        var reset = function(event) {
            $.pjax.reload({container: '#transit-nomenclature-pjax'});
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
    
    $('#transit-nomenclature-form').submit(NomenclatureForm.send);
    $('#transit-nomenclature-form').on('reset', UnitQuantityInput.resetLabel);
    $('#transit-nomenclature-pack_unit-select').change(ProductPackUnitInput.change);
});

JS;

$this->registerJs($js);

?>

<?php endif ?>
