$(function() {
    var QuantityChecker = (function() {
        var url = '/warehouse/warehouse-product/check-available';

        var getSelect = function() {
            return $('.autocomplete-select').first();
        };

        var getWarehouseId = function() {
            return  $('.operation-nomenclature').first().attr('data-warehouse-id');
        };

        var init = function() {
            var select = getSelect();
            if (!select.attr('data-check-qty')) {
                return false;
            }
            attachEvents();
            select.closest('div[data-pjax-container]').first().on('pjax:complete', attachEvents);
        };

        var attachEvents = function() {
            getSelect().on('change', changeEventListener);
        };

        var changeEventListener = function() {
            var productId = $(this).val();
            if (!productId) {
                resetQtyLabel();
            } else {
                post(productId);
            }
        };

        var post = function(productId) {
            console.log('dglkmdddddddddddddddddd');
            //$.post(url, {productId: productId, warehouseId: getWarehouseId()}, postCallback);
            $.ajax({
                url:url,
                type:"POST",
                data:{productId: productId, warehouseId: getWarehouseId()},
                contentType:"application/json; charset=utf-8",
                dataType:"json",
                success: postCallback,
            });
        };

        var postCallback = function(response) {
            if (response.success === true) {
                changeQtyLabel(response.available);
            }
        };

        var changeQtyLabel = function(value) {
            if (value) {
                value = '<span class="not-set">(<= ' + value + ')</span>';
            }
            $('#position-available-qty').html(value);
        };

        var resetQtyLabel = function() {
            $('#position-available-qty').text('')
                .closest('label').first()
                .siblings('input').first().val('');
        };

        return {
            init: init
        };
    })();

    QuantityChecker.init();
});
