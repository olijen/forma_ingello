var LocalStorageDistributor = (function() {
    var init = function() {
        $.each(getTables(), fillTable);
    };

    var fillTable = function(idx, table) {
        var tableData = getTableData($(table));
        if (tableData === null) {
            return;
        }
        $.each(tableData, rowAction($(table)));
    };

    var rowAction = function($table) {
        return function(id, row) {
            var $tr = $table.children('tbody').first().children('tr[data-key=' + id + ']').first();
            $.each(row, cellAction($tr));
        };
    };

    var cellAction = function($tr) {
        return function(name, val) {
            $tr.find('textarea[name=' + name + ']').first().val(val);
        };
    };

    var getTables = function() {
        return $('table[data-table-key]');
    };

    var getTableData = function($table) {
        var key = location.href + '#' + $table.attr('data-table-key');
        var data = localStorage.getItem(key);
        return data ? JSON.parse(data) : null;
    };

    return {
        init: init
    };
})();

$(function() {
    LocalStorageDistributor.init();
});
