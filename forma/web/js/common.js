$(function () {
    function requestSku() {
        var formData = $('#product-product-form').serialize(),
            nameIsEmpty = !$('#product-product-form #product-name').val();
        if (!nameIsEmpty) {
            $.ajax({
                url: '/product/product/get-sku',
                type: 'POST',
                dataType: 'JSON',
                data: formData
            })
                .done(function(response) {
                    $('#product-product-form #product-sku').val(response.sku);
                });
        } else {
            $('#product-product-form #product-sku').val('');
        }
    }

    $('#product-product-form select').change(requestSku);
    $('#product-product-form input').keyup(requestSku);
});

$('#import-file-input').change(function() {
    var sendUrl = '/product/product/import-excel';
    var fd = new FormData();

    console.log(this.files);

    fd.append('excel', this.files[0]);

    $.ajax({
        url: sendUrl,
        type: 'POST',
        data: fd,
        dataType: 'json',
        cache: false,
        processData: false,
        contentType: false
    })
    .done(function(response) {
        response = JSON.parse(response);

        var goToWarehouse = function() {
            if (response.warehouseId
                && window.location.href.indexOf('?id=' + response.warehouseId) == -1) {
                window.location.href = '/warehouse/warehouse/view?id=' + response.warehouseId;
            } else {
                if ($('#pjax-product-grid').length > 0) {
                    $.pjax.reload({container: '#pjax-product-grid'});
                } else if ($('#pjax-grid-remains').length > 0) {
                    $.pjax.reload({container: '#pjax-grid-remains'});
                }
            }
        };

        if (response.success == true) {
            krajeeDialog.alert('Data loaded', goToWarehouse);
        } else {
            console.log(response.errors[0]);
            krajeeDialog.alert(response.errors[0]);
        }

        $('#import-file-input').val('');
    })
    .fail(function() {
        $('#import-file-input').val('');
    });
});
