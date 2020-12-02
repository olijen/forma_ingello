$(document).ready(function() {

    window.dialog = [];


    let sellingId = $('#sellingId').val();
    localStorage.setItem('sellingId', JSON.stringify(sellingId));
    $('#sellingId').val(JSON.parse(localStorage.getItem('sellingId')));

    function setStorageDialog(dialog) {
        localStorage.setItem('dialog', JSON.stringify(dialog));
    }

    function getStorageDialog() {
        return  JSON.parse(localStorage.getItem('dialog'));
    }

    function actionCheckbox(id) {
        $('#checkbox_'+id).attr('checked', 'checked');
        $('#children_'+ id).toggle('slow');

        $('#'+id).off();
    }

    function formActives(mode = null) {
        if (mode === 'off') {
            $('form').submit(function() {
                return false;
            });
        } else {
            $('form').submit(function() {
                return true;
            });
        }
    }

    function replaceSpaсe(request) {
        return request.replace(/[0-9]/g, '');
    }

    function getRequest(request) {
        return replaceSpaсe($('#'+request).text())
    }

    function getAnswer(answerId) {
        if ( $('#'+answerId).text() === ''){
            return $('#'+answerId).val();
        } else {
            return $('#'+answerId).text();
        }

    }

    function getComment() {
        let comment = $('#'+ $('#sellingId').val() + '_comment' ).val();

        return '<div style="background: mediumseagreen;" class="alert alert-primary" role="alert">' + comment + '</div>';
    }

    function getDialog() {
        let dialog = '';
        $.each(getStorageDialog(), function (index, value, is_client) {
            if (value[1] !== 0 ) {
                dialog += '<div style="background: #c5ddfc;" class="alert alert-primary" role="alert">'+((value[2]==1)?'Клиент':'Менеджер')+': <p>' + getRequest(value[0])
                    + '</p></div>' +
                    '<div style="background: #c5ddfc;" class="alert alert-primary" role="alert">'+((value[2]==1)?'Менеджер':'Клиент')+': <p>' + getAnswer(value[1]) + '</p></div>';

            } else {
                return alert('Дайте ответ на вопрос' + getRequest(value[0]))
            }

        });

        return dialog;
    }

    function setDialogToArray(requestId, answerId, is_client ) {
        if (is_client === undefined) is_client = 1;
        if (answerId === undefined){
            window.dialog.push([requestId, 0, is_client]);
            setStorageDialog(window.dialog);
        } else {
            window.dialog.push([requestId, answerId, is_client]);
            setStorageDialog(window.dialog);
        }

        actionCheckbox(requestId);
    }

    function getNextStep() {
        if ($('#next_step').val() === '') {
            return false;
        } else {
            return '<div style="background: yellowgreen;" class="alert alert-primary" role="alert">' + $('#next_step').val() + '</div>';
        }
    }

    $('.selected-item')
        .on('click', function () {
            let id = $(this).attr('id');
            $('#children_'+ id).toggle('slow');

        })
        .on('mouseover', function () {
            $(this).addClass('active');
        })
        .on('mouseout', function () {
            $(this).removeClass('active')
        });

    $('.text-answer').on('click', function(){

        let requestId = $(this).attr('data-request');
        let answerId = $(this).attr('id');
        let is_client = $(this).attr('data-client');

        setDialogToArray(requestId, answerId, is_client);
        getDialog();
    });

    $('.no-usage-btn').on('click', function () {
        let requestId = $(this).attr('data-requset-no-useg');
        $('#no-usage-list').append("<li class='list-group-item' >"
            + getRequest(requestId) +
            "ваш ответ "
            +
            "<input type='text'  class='no-usage-input'  data-id-request= "+ requestId +" ></li>" );
        $('.no-usage-input').on('change', saveCustom);
        setDialogToArray(requestId, undefined, $(this).attr('data-client'));


    });
    function sendAnswer(requestId, input) {
        return $.ajax({
            url: 'talk/save-custom-answer',
            data: {
                requestId: requestId,
                answer: input.val()
            }
        });
    }

    function saveCustom() {
        let dialog = getStorageDialog();
        let requestId = $(this).attr("data-id-request");
        let inpt = $(this);
        $.each(dialog, function (index, value) {
            if (requestId === value[0]) {
                let data = sendAnswer(requestId, inpt);
                data.success(function (id) {
                    inpt.attr('id', 'children_item_'+id);
                    dialog[index][1] = 'children_item_'+id;
                    setStorageDialog(dialog);
                });
            }
        });
    }


    $('#end-talk').on('click', function () {
        if ($('#'+ $('#sellingId').val() + '_comment' ).val() === '' || getNextStep() === false ) {
            alert('Оставьте коментарий к диалогу и добавьте следуйщий шаг');
            return false;
            formActives('off');
        } else {
            $.ajax({
                url: 'talk/save-dialog',
                type: 'post',
                data: {
                    id: $('#sellingId').val(),
                    dialog: getDialog(),
                    comment:  getComment(),
                    nextStep: getNextStep(),
                },
                success: function () {
                    localStorage.clear();
                }
            });
            formActives();
            $('#end-talk')[0].style.pointerEvents = 'none'
            $('#form-customer').submit();
        }
    });
});
