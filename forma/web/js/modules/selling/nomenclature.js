$(function() {
    $('.operation-nomenclature .ui-autocomplete-input').autocomplete({
        select: function(event, ui) {
            if (ui.item === undefined) {
                return false;
            }

            var productId = ui.item.id,
                productIdInput = $('input[name="SellingProduct[product_id]"]'),
                packUnitId = ui.item.packUnitId,
                nomenclatureForm = $('#selling-nomenclature-form'),
                availableQtyLabel = $('#sellingproduct-quantity-available'),
                autocompleteInput = $($('.operation-nomenclature .ui-autocomplete-input')[0]);

            productIdInput.val('' + productId);

            var checkProductQty = function(response) {
                if (response.success !== true) {
                    return false;
                }

                autocompleteInput.val(response.originalName);
                availableQtyLabel.html('<span class="not-set">(<= ' + response.available + ')</span>');
            };

            var fillSelect = function(response) {
                if (response.success !== true) {
                    return false;
                }

                var packUnitSelect = $('#selling-nomenclature-pack_unit-select');

                packUnitSelect.empty();
                packUnitSelect.append('<option>');

                $.each(response.data, function(key, value) {
                    packUnitSelect.append($('<option>', {
                        value: value.id,
                        text : value.name + ' (' + value.bottles_quantity + ' pc.)'
                    }));
                });

                packUnitSelect.val('' + packUnitId);

                $.post('/product/product/check-available', {
                    productId: productId,
                    warehouseId: nomenclatureForm.data('warehouse-id')
                }).done(checkProductQty);
            };

            $.ajax({
                url: '/product/product/get-pack-units-on-warehouse',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    productId: productId,
                    warehouseId: nomenclatureForm.data('warehouse-id')
                }
            }).done(fillSelect);
        }
    });
});

$(function() {
    var packUnitSelect = $('#selling-nomenclature-pack_unit-select'),
        productIdInput = $('input[name="SellingProduct[product_id]"]'),
        autocompleteInput = $($('.operation-nomenclature .ui-autocomplete-input')[0]);

    packUnitSelect.change(function(event) {
        var packUnitId = $(this).val(),
            productId = productIdInput.val();

        $.ajax({
            url: '/product/product/get-variation-by-pack-unit',
            type: 'POST',
            data: {
                packUnitId: packUnitId,
                productId: productId
            },
            dataType: 'JSON'
        })
            .done(function(response) {
                if (response.success !== true) {
                    return false;
                }
                productIdInput.val('' + response.VariationId);

                $('#selling-nomenclature-form').yiiActiveForm('updateAttribute', 'sellingproduct-quantity', '');
                $('#sellingproduct-quantity-available').html('');
            });
    });

});
