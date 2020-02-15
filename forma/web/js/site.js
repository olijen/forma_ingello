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
