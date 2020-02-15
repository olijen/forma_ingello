$(function() {

    var ColumnRenamer = (function() {

        var renameBtnSelector = "span.rename-column-btn";

        var init = function() {
            handleRenameBtnClick();
        };

        var handleRenameBtnClick = function() {
            $("body").on("click", renameBtnSelector, renameBtnClickHandler);
        };

        var renameBtnClickHandler = function(event) {
            var $btn = $(this);
            var currentLabel = getCurrentLabel($btn);

            krajeeDialog.prompt({
                label:'Переименовать колонку',
                value: currentLabel
            }, function (result) {
                if (!result) {
                    return false;
                }
                changeLabel($btn, result);
            });



            setTimeout(function() {
                var $editorInput = $("div.bootstrap-dialog-message input[value=\"" + currentLabel + "\"]");
                $editorInput.select();
                $editorInput.focus();
            }, 500);
        };

        var getCurrentLabel = function($btn) {
            return $btn.siblings("span.config-column-label").first().text();
        };

        var changeLabel = function($btn, result) {
            $btn.siblings("span.config-column-label").first().text(result);
        };

        init();
    })();
});
