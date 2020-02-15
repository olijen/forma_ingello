(function($) {
    $.fn.groupOperation = function(action, options) {
        var $target = $(this),
            gridViewId = $target.attr('id'),

            message = options.message || false,
            params = options.params || {},
            pjax = !!options.pjax || true,

            csrf = $('input[name="_csrf"]').val();

        if (!action) {
            return console.error('action cannot be blank');
        }
        if (!gridViewId) {
            return console.error('id cannot be empty');
        }

        var keys = $('#' + gridViewId).yiiGridView('getSelectedRows');

        if (keys.length == 0) {
            return krajeeDialog.alert('Nothing selected');
        }

        var sendSelection = function () {
            var post = Object.assign({
                'selection': keys,
                '_csrf': csrf
            }, params);

            if (pjax) {
                var pjaxId = '#' + $($target.parents('div[data-pjax-container]')[0]).attr('id');

                $.post(action, post).done(function() {
                    $.pjax.reload({container: pjaxId});
                });
            } else {
                var $form = $('<form id="group-operation-form" action = "' + action + '" method="POST"></form>');

                for (var key in post) {
                    $form.append('<input type="text" name="' + key + '" value="' + post[key] + '">');
                }

                $($form).appendTo('body').submit();
            }
        };

        if (message) {
            krajeeDialog.confirm(message, function(allow) {
                if (allow) {
                    sendSelection();
                }
            });
        } else {
            sendSelection();
        }
    };
})(jQuery);
