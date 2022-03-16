//TODO вечать на grid-view select change
$(function() {
    $('.grid-view tbody td, table.kv-grid-table tbody td').click(function(event) {
        if (!$(this).hasClass('kv-expand-icon-cell') && !$(this).hasClass('no-load') && !$(this).hasClass('no-load') && !$(this).hasClass('editable-cell')) {
            var $td = $(this),
                $row = $td.closest('tr').first();

            if ($td.find('a').length > 0 || $td.find('input').length > 0) {
                return;
            }

            var url = $row.find("a[title='Редактировать']").first().attr('href');
            if (url) {
                window.location.href = url;
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", function(event) {

    $('.grid-view tbody a[href*="delete"]').each(function() {
        this.className += ' no-loader';
    })

    $('.kv-expand-row ').each(function() {
        this.className += ' no-loader';
    })

    $('.kv-grid-table tbody a[href*="delete"]').each(function() {
        this.className += ' no-loader';
    })


    $('.kv-panel-before a').each(function () {
        this.className += ' no-loader';
    });
    $('.extend-before a').each(function () {
        this.className += ' no-loader';
    });

    $('li.menuColor span:not([class])').css('width', '227px');

    $('ul.treeview-menu').css('width', '220px');
});

function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");

    if (parts.length == 2) {
        return parts.pop().split(";").shift();
    } else {
        return null;
    }
}

function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
}

