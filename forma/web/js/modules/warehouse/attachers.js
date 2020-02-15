$(function() {
    $('body').on('click', '#grid-remains #add-to-purchase', function() {
       $('#grid-remains').groupOperation('/purchase/main/create-by-remains', {
           params: {
               warehouse_id: $.getUrlVar('id')
           }
        });
    });

    $('body').on('click', '#grid-remains #add-to-transit', function() {
        $('#grid-remains').groupOperation('/transit/main/create-by-remains', {
            params: {
                warehouse_id: $.getUrlVar('id')
            }
        });
    });

    $('body').on('click', '#grid-remains #add-to-selling', function() {
        $('#grid-remains').groupOperation('/selling/main/create-by-remains', {
            params: {
                warehouse_id: $.getUrlVar('id')
            }
        });
    });

    $('body').on('click', '#grid-remains #create-purchase', function() {
        if ($('#grid-remains').yiiGridView('getSelectedRows').length == 0) {
            $.post('/purchase/main/create-by-warehouse', {
                warehouse_id: $.getUrlVar('id')
            });
            return true;
        }
        $('#grid-remains').groupOperation('/purchase/main/create-by-remains', {
            params: {
                warehouse_id: $.getUrlVar('id')
            }
        });
    });

});
