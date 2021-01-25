document.addEventListener("DOMContentLoaded", function(event) {
    //РАБОТА НА СТРАНИЦЕ ПРОДУКТОВ С ВИДЖЕТОМ SWITCHINPUT

    if ($('.switchInputContainer').length) {
        console.log('Клик на клик');
        $('.switchInputContainer input[type="hidden"]').each(function () {
            this.value = '';
        });

        $('.bootstrap-switch-label, .bootstrap-switch-handle-off, .bootstrap-switch-handle-on').each(function () {
            this.onclick = function () {
                console.log("КЛик на лабле");
                //let switchInputContainer = this.closest('.switchInputContainer');
                $(this).parents('.switchInputContainer').find('input[type="hidden"]')[0].value = 0;
                console.log($(this).parents('.switchInputContainer').find('input[type="hidden"]'));
            };
        });

        $('span.close.kv-ind-toggle').each(function () {
            this.onclick = function () {
                //let switchInputContainer = this.closest('.switchInputContainer');
                $(this).parents('.switchInputContainer').find('input[type="hidden"]')[0].value = '';
                console.log($(this).parents('.switchInputContainer').find('input[type="hidden"]'));
            };
        });
    }
});

