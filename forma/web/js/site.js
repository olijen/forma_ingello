alert('hello');

$(function() {
    $('.grid-view tbody td, table.kv-grid-table tbody td').click(function(event) {
        var $td = $(this),
            $row = $td.closest('tr').first();

        if ($td.find('a').length > 0 || $td.find('input').length > 0) {
            return;
        }

        var url = $row.find("a[title='Редактировать']").first().attr('href');
        if (url) {
            window.location.href = url;
        }
    });
});

document.addEventListener("DOMContentLoaded", function(event) {

    $('.grid-view tbody a[href*="delete"]').each(function() {
        this.className += ' no-loader';
    })

    $('.kv-grid-table tbody a[href*="delete"]').each(function() {
        this.className += ' no-loader';
    })


    $('.kv-panel-before a').each(function () {
        this.className += ' no-loader';
    });

    $('li.menuColor span:not([class])').css('width', '227px');

    $('ul.treeview-menu').css('width', '220px');

    // var sortables = sortable('.sortable');
    //
    // for (var i = 0; i < sortables.length; i++) {
    //
    //
    // }
});


