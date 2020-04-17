var EditableDataColumn = (function() {
    var curCellsVals = [];
    var preCellsVals = [];

    var init = function() {
        $('tbody td.editable-cell').each(initCell);
        attachListeners();
    };

    var initCell = function(index) {
        var $input = $(this).children().first();
        $input.attr('data-index', index);
        setCurrentValue($input, index);

        if (isLocalStorageMode($input)) {
            initSaveLink($input);
        }
    };

    var initSaveLink = function($input) {
        var url = getUpdateUrl($input, true);
        var $link = $('a[href="' + url + '"]').first();
        if ($link.attr('data-for-grid')) {
            return;
        }
        $link.attr('data-for-grid', getTableKey($input));
    };

    var setCurrentValue = function($input, index) {
        preCellsVals[index] = curCellsVals[index];
        curCellsVals[index] = $input.val();
    };

    var getCurrentValue = function($input, index) {
        return curCellsVals[index];
    };

    var attachListeners = function() {
        $('td.editable-cell > textarea').on('blur', changeEventListener)
            .on('keydown', typeEventListener);

        $('td.editable-cell > select').on('change', changeEventListener);

        $('a[data-for-grid]').click(sendLocalStorageListener);
    };

    var changeEventListener = function() {
        if (inputIsChanged($(this))) {
            return isLocalStorageMode($(this)) ? save($(this)) : send($(this));
        }
    };

    var typeEventListener = function(event) {
        if (event.keyCode != 13) {
            return true;
        }
        event.preventDefault();
        $(this).blur();
    };

    var sendLocalStorageListener = function(event) {
        event.preventDefault();

        var pjaxContainer = $(this).closest('div[data-pjax-container]').first().attr('id');
        var url = $(this).attr('href');
        var tableKey = $(this).attr('data-for-grid');
        var tableData = getTableFromLocalStorage(tableKey);

        if (tableData.length == 0) {
            // todo: Вынести
            return krajeeDialog.alert('Нет данных для проведения');
        }

        $.pjax.reload({
            container: '#' + pjaxContainer,
            url: url,
            data: {table: tableData},
            type: 'POST',
            replace: false
        });
    };

    var inputIsChanged = function($input) {
        var cellIndex = $input.attr('data-index');
        var inputValue = $.trim($input.val());
        return (curCellsVals[cellIndex] != inputValue);
    };

    var send = function($input) {
        $.post(getUpdateUrl($input), $input.serialize(), createResponseCallback($input));
    };

    var createResponseCallback = function($input) {
        var cellIndex = $input.attr('data-index');

        return function(response) {
            if (response.success === true) {
                setCurrentValue($input, cellIndex);

                var pjaxContainer = $input.attr('data-reload-pjax');
                if (pjaxContainer !== undefined) {
                    $.pjax.reload({container: '#' + pjaxContainer});
                }
                return true;
            }
            $input.val(getCurrentValue($input, cellIndex));
            $input.focus();
            var message = response.message ?
                response.message : 'YoutData not saved';
            krajeeDialog.alert(message);
        };
    };

    var getRecordId = function($input) {
        var id = $input.attr('data-key');
        if (id === undefined) {
            id = $input.closest('tr').first().attr('data-key');
        }
        return id;
    };

    var getUpdateUrl = function($input, forTable) {
        forTable = forTable || false;

        var url = $input.attr('data-update-url');

        if (url === undefined) {
            url = $input.closest('table').first().attr('data-update-url');
        }
        if (url === undefined) {
            console.error('data-update-url attribute not found');
            return false;
        }

        if (!forTable) {
            url += '?id=' + getRecordId($input);
        }
        return url;
    };

    var isLocalStorageMode = function($input) {
        var $table = $input.closest('table').first();
        if ($input.attr('data-local-storage') === '1' || $table.attr('data-local-storage') === '1') {
            return true;
        }
        return false;
    };

    var save = function($input) {
        var cellIndex = $input.attr('data-index');
        setInLocalStorage($input);
        setCurrentValue($input, cellIndex);
    };

    var setInLocalStorage = function($input) {
        var key = getTableKey($input);
        var recordId = getRecordId($input);
        var tableData = getTableFromLocalStorage(key, $input);

        tableData[recordId][$input.attr('name')] = $input.val();

        localStorage.setItem(key, JSON.stringify(tableData));
    };

    var getTableFromLocalStorage = function(key, $input) {
        $input = $input || false;

        var data = localStorage.getItem(key) || '[]';
        var dataObj = JSON.parse(data);

        if ($input) {
            var recordId = getRecordId($input);

            if (dataObj[recordId] === undefined) {
                dataObj[recordId] = {};
            }
        }

        return dataObj;
    };

    var getTableKey = function($input) {
        return location.href + '#' + $input.closest('table').first().attr('data-table-key');
    };

    return {
        init: init,
        attachListeners: attachListeners
    };

})();

$(function() {
    EditableDataColumn.init();
});
