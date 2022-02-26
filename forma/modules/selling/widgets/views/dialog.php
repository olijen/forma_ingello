<?php

use forma\modules\core\widgets\DetachedBlock;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii2fullcalendar\yii2fullcalendar;
use yii\web\JsExpression;
use forma\modules\core\widgets\CalendarWidget;
use yii\bootstrap\Modal;
use forma\extensions\fullcalendar;
use yii\widgets\Pjax;

$date = date_create();
$hash_for_event = date_timestamp_get($date);
$hostInfo = Url::home(true);
?>

<style>
    .btn-item-selected {
        margin-left: 231px;
    }


    .row {

        margin-top: -10px;
    }

    .answer-grid-border {
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000 ;
        min-height: 1.5em !important;
    }

    .answer-grid-border:nth-child(n+1){
        background-color: #00CC00;
        opacity: 0.2;
    }


    .answer-grid-border:nth-child(n+2){
        background-color: #00CC00;
        opacity: 0.2;
    }



    .answer-grid-border:nth-child(n+3){
        background-color: #00CC00;
        opacity: 0.2;
    }

    .header-item {
        display: none;
    }


    .text-answer {
        padding-top: 5%;
    }

    .close-item {
        position: absolute;
        right: 14px;
        color: #d9534f;
        top: -1.7px;
        font-size: 24px;
        border-color: #d43f3a;
    }

    .parent-list {
        overflow: auto;
        width: 100%;
        height: 520px;
    }

    .hidden-block-selected {
        display: none;
        width: 100%;
        height: auto;
    }

    .request-answer {
        margin-top: 5%;
        /*border: 2px solid #00a65a !important;*/
    }

    .list-request-answer {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .search-answer {
        padding-bottom: 4%;
    }

    .header-list {
        background-color: #00a65a;
        width: 100%;
        padding-bottom: 3%;
    }

    .header-name {
        font-size: 14px;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<div class="row">
    <div class="col-md-6">
        <div class="list-request-answer" >

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Вопросы от клиента
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <ul class="list-group parent-list">
                                <?php if(!empty($model)): foreach ($model as $request ): if ($request->is_manager == 1) continue; ?>
                                    <li style="cursor: pointer;" id="<?= $request->id ?>" class="list-group-item d-flex justify-content-between align-items-center selected-item-one">
                                        <input id ="checkbox_<?= $request->id ?>" class="form-check-input checkbox-item" type="checkbox" value="" disabled>
                                        <?= $request->text ?>
                                        <span class="badge badge-primary badge-pill"><?=\forma\modules\selling\services\AnswerService::getCountAnswer($request)?></span>
                                    </li>
                                    <div  id="children_<?= $request->id ?>" class="hidden-block-selected">
                                        <ul class="list-group" >
                                            <?php foreach ($request->getAnswers()->all() as $answer): ?>
                                                <li  class="list-group-item " >
                                                    <p id="children_item_<?= $answer->id ?>" class="text-answer" data-client="1" data-request="<?=$request->id?>"><?= $answer->text ?></p>
                                                </li>
                                            <?php endforeach; ?>
                                            <li class="list-group-item" ><button id="no_usage_answer_<?= $request->id ?> " data-client="1" data-requset-no-useg="<?= $request->id ?>"  class="btn-danger  no-usage-btn">Не использовал</button></li>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Вопросы от менеджера
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <ul class="list-group parent-list">
                                <?php if(!empty($model)): foreach ($model as $request ): if ($request->is_manager != 1) continue; ?>
                                    <li style="cursor: pointer;" id="<?= $request->id ?>" class="list-group-item d-flex justify-content-between align-items-center selected-item-two">
                                        <input id ="checkbox_<?= $request->id ?>" class="form-check-input checkbox-item" type="checkbox" value="" disabled>
                                        <?= $request->text ?>
                                        <span class="badge badge-primary badge-pill"><?=\forma\modules\selling\services\AnswerService::getCountAnswer($request)?></span>
                                    </li>
                                    <div  id="children_<?= $request->id ?>" class="hidden-block-selected">
                                        <ul class="list-group" >
                                            <?php foreach ($request->getAnswers()->all() as $answer): ?>
                                                <li  class="list-group-item " >
                                                    <p id="children_item_<?= $answer->id ?>" class="text-answer" data-client="0" data-request="<?=$request->id?>"><?= $answer->text ?></p>
                                                </li>
                                            <?php endforeach; ?>
                                            <li class="list-group-item" ><button id="no_usage_answer_<?= $request->id ?> " data-client="0" data-requset-no-useg="<?= $request->id ?>"  class="btn-danger  no-usage-btn">Не использовал</button></li>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                                 <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <?php DetachedBlock::begin(); ?>
        <?php $form = ActiveForm::begin([
            'action' => '/selling/talk/end-talk?sellingId=' . $sellingId,
             'options' => [
                     'class' => 'form-inline',
                     'style' => 'display:inline',
             ],
            'id' => 'form-customer',
        ]) ?>
        <div class="row">


            <?= $form->field($customer, 'id')->textInput()->hiddenInput()->label(false); ?>
            <?= $form->field($customer, 'name', ['options' => ['class' => 'col-md-6']])->textInput()->label('Имя'); ?>
            <?= $form->field($customer, 'firm', ['options' => ['class' => 'col-md-6']])->textInput()->label('Фирма'); ?>
            <?= $form->field($customer, 'address', ['options' => ['class' => 'col-md-6']])->textInput()->label('Адрес'); ?>
            <?= $form->field($customer, 'chief_email', ['options' => ['class' => 'col-md-6']])->textInput()->label('Email ЛПР'); ?>
            <?= $form->field($customer, 'company_email', ['options' => ['class' => 'col-md-6']])->textInput()->label('Email компании'); ?>
            <?= $form->field($customer, 'chief_phone', ['options' => ['class' => 'col-md-6']])->textInput()->label('Номер телефона ЛПР'); ?>
            <?= $form->field($customer, 'company_phone', ['options' => ['class' => 'col-md-6']])->textInput()->label('Номер телефона компании'); ?>
            <?= $form->field($customer, 'site_company', ['options' => ['class' => 'col-md-6']])->textInput()->label('Сайт компании'); ?>
            <div class="form-group col-md-12">
                <label for="comment">Комментарий к диалогу</label>
                <?php echo \vova07\imperavi\Widget::widget([
                    'name' => 'comment',
                    'id' => $sellingId."_comment",
                    'settings' => [
                        'lang' => 'ru',
                        'minHeight' => 200,
                        'plugins' => [
                            'clips',
                            'fullscreen',
                        ],
                        'clips' => [
                            ['Lorem ipsum...', 'Lorem...'],
                            ['red', '<span class="label-red">red</span>'],
                            ['green', '<span class="label-green">green</span>'],
                            ['blue', '<span class="label-blue">blue</span>'],
                        ],
                    ],
                ]); ?>

            </div>

        </div>

        <div class="row">
            <div class="col-xs-6">
            <label for="next_step">Следуйщий шаг</label>
           <input type="text" name="next_step" id="next_step" class="form-control">
            </div>

           <div class="col-xs-6">
               <p style="margin: 0 0 5px; font-weight: bold">Выберите дату</p>
               <?php
                Modal::begin([
                    'header' => '<h2>Планирование</h2><h3 id="step"></h3>',
                    'toggleButton' => [
                        'label' => 'Календарь',
                        'tag' => 'button',
                        'class' => 'btn btn-success col-xs-12',
                        'id' => 'mBut',
                        'onclick' => 'next()',
                    ],
                    'closeButton' =>[
                            'onClick' =>'findHash();',
                            'id' => 'hash',
                        ]
                ]); ?>

        </div>
        </div>

        <script>
            function next() {
                return false;
                alert(1);
              let next = $("#next_step").val();
                step.textContent= next;
                inputValue = next;
            }
            next();
        </script>

        <?php


        $DragJS = <<<JS
$('.chartjs-size-monitor').remove();
(function($){//fix jquery
    jQuery.fn.zIndex = function(a) {
        console.log(a);
        return $(this).css("zIndex", a);
    }
})(jQuery);

$("document").ready(function(){
    $("#create-event").on("pjax:end", function() {
      $.pjax.reload({container:"#calendar"});  //Reload GridView
    });
});


function editEvent(event,start)
{
    var ServerMapper;
    if (event.title) {
        serverMapper = {
            'Event[name]': event.title,
            'Event[text]': event.title,
            'Event[date_from]': event.start.format('DD.MM.YYYY'),
            'Event[date_to]': event.end.format('DD.MM.YYYY'),
            'Event[start_time]': event.start.format("hh:mm:ss"),
            'Event[end_time]': event.end.format("hh:mm:ss"),
            'Event[event_type_id]': 1,
            'Event[status]': 1,
        }
        $.post( "/event/event/update?json&id="+event.id+'&date_from='+start.format('DD.MM.YYYY'), serverMapper, function( data ) {
          console.log('Сервер сохранил событие');
        }).fail(function() {
          console.log("Внутренняя ошибка");
        });
    }
}

function createEvent(start, end, title)
{
    var eventData;
    var ServerMapper;
    if (title) {
        eventData = {
            color: 'red',
            title: title,
            start: start,
            end: end
        };
        serverMapper = {
            'Event[name]': title,
            'Event[text]': title,
            'Event[date_from]': start.format('DD.MM.YYYY'),
            'Event[date_to]': end.format('DD.MM.YYYY'),
            'Event[start_time]': $.fullCalendar.formatDate(start,"H:m:s"),
            'Event[end_time]': $.fullCalendar.formatDate(end,"H:m:s"),
            'Event[event_type_id]': 4,
            'Event[status]': 1,
        }
        $.post( "/event/event/create?json", serverMapper, function( data ) {
          $('#w0').fullCalendar('renderEvent', eventData, true);
        }).fail(function() {
          alert("Внутренняя ошибка2");
        });
    }
    $('#w0').fullCalendar('unselect');
}
JS;

        $this->registerJs($DragJS);

        $JSCode = <<<JS

function(start, end) {
    let inputNext = $("#next_step").val().replaceAll(/ +/g, ' ').trim().replaceAll(" ",'%20').replaceAll(" ",'%20').replaceAll(/\?/g,'%3f');
    let url = '/event/event/create?date_from='+start.format('DD.MM.YYYY')+'&date_to='+end.format('DD.MM.YYYY')+'&start_time='+start.format('H:m:ss')+'&end_time='+end.format('H:m:ss')+'&name='+inputNext+'&selling_id='+$sellingId+'&hash='+$hash_for_event;
    $('#modal .modal-dialog .modal-content .modal-body').load(url);
    $('#modal').modal();
    

    //createEvent(start, end, title);
}
JS;

        $JSEventClick = <<<JS
function(calEvent, jsEvent, view) {
    $('#modal .modal-dialog .modal-content .modal-body').load('/event/event/update?id='+calEvent.id);
    $('#modal').modal();
    
    //$(this).css('border-color', 'red');
}
JS;
        $JSEventResize = <<<JS
function(calEvent, jsEvent, view) {
    console.log(calEvent);
    //$('#modal .modal-dialog .modal-content .modal-body').load('/event/event/update?id='+calEvent.id);
    //$('#modal').modal();
    // change the border color just for fun
    //$(this).css('border-color', 'red');
    editEvent(calEvent);
}
JS;

        $JSEventDrop = <<<JS
function(calEvent, jsEvent, view) {
    //jsEvent.preventDefault();
    //console.log(calEvent);
    //$('#modal .modal-dialog .modal-content .modal-body').load('/event/event/update?id='+calEvent.id);
    //$('#modal').modal();
    // change the border color just for fun
    //$(this).css('border-color', 'red');
    editEvent(calEvent);
}
JS;
        ?>

        <script>

            function smallWidget() {
                small_widgets_in_block = [];
                var num = $('#panel_small_widget').children('li').length;
                for(var i = 0; i < num; i++){
                    small_widgets_in_block.push($('#panel_small_widget').children('li').children('.box')[i]);
                }

                for(var i = 0; i < small_widgets_in_block.length; i++){
                    if(small_widgets_in_block[i].className.indexOf('collapsed-box small_widget') == -1)
                        small_widgets_in_block[i].className += ' collapsed-box small_widget';
                    $('.small_widget').find('.small_widget_header').css('display', 'block');
                    $('.small_widget').find('.big_widget_header').css('display', 'none');

                }
            }
        </script>

        <?php

        $JSUpdateSmallWidgetsOld =  <<<JS
function(calEvent, jsEvent, view) {
    //jsEvent.preventDefault();
    //console.log(calEvent);
    //$('#modal .modal-dialog .modal-content .modal-body').load('/event/event/update?id='+calEvent.id);
    //$('#modal').modal();
    // change the border color just for fun
    //$(this).css('border-color', 'red');
    // alert(1);
    // var cc = sortable('.sortable')[0].childNodes[0];
    // console.log(cc);
    // sortable('.sortable')[0];
    console.log('calEvent');
    console.log(calEvent);
    small_widgets_in_block = [];
    var num = $('#panel_small_widget').children('li').length;
    console.log('числослос' + num);
    for(var i = 0; i < num; i++){
        small_widgets_in_block.push($('#panel_small_widget').children('li').children('.box')[i]);
        console.log($('#panel_small_widget').children('li').children('.box')[i]);
        //calEvent.target.children[i].children[0].className += ' small_widget';
        //console.log(calEvent.target.children[i].children[i].className);
    }

    for(var i = 0; i < small_widgets_in_block.length; i++){
        if(small_widgets_in_block[i].className.indexOf('collapsed-box small_widget') == -1)
            small_widgets_in_block[i].className += ' collapsed-box small_widget';
        console.log('ищем внутренние хедеры');
        $('.small_widget').find('.small_widget_header').css('display', 'block');
        $('.small_widget').find('.big_widget_header').css('display', 'none');

    }
    console.log(small_widgets_in_block);
    console.log($('.small_widget').find('.small_widget_header'));


    //console.log(calEvent.target.childNodes[0].childNodes[1]);
    //calEvent.target.childNodes[0].childNodes[1].className += " collapsed-box";
    //sortable('.sortable')[0].childNodes[0].childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[0].className = 'fa fa-plus';
}
JS;

        $JSUpdateSmallWidgets = <<<JS
function(calEvent, jsEvent, view) {
    small_widgets_in_block = [];
    var num = $('#panel_small_widget').children('li').length;
    var request_string = "";
    for(var i = 0; i < num; i++){
        small_widgets_in_block.push($('#panel_small_widget').children('li').children('.box')[i]);
    }

    for(var i = 0; i < small_widgets_in_block.length; i++){
        if(small_widgets_in_block[i].className.indexOf('collapsed-box small_widget') == -1)
            small_widgets_in_block[i].className += ' collapsed-box small_widget';
        $('.small_widget').find('.small_widget_header').css('display', 'block');
        $('.small_widget').find('.big_widget_header').css('display', 'none');
        request_string += "WidgetUser["+small_widgets_in_block[i].dataset.widget_name+"][active]=0&" +
         "WidgetUser["+small_widgets_in_block[i].dataset.widget_name+"][col]=0&" +
          "WidgetUser["+small_widgets_in_block[i].dataset.widget_name+"][row]="+i +"&" +
           "WidgetUser["+small_widgets_in_block[i].dataset.widget_name+"][collapsed]=0&";
    }
    console.log(request_string);


    $.ajax({
      type: "POST",
      url: "/core/widget-user/update-order",
      data: request_string
    }).done(function( msg ) {

    });


}
JS;

        $JSUpdateBigWidgets = <<<JS
        function(calEvent, jsEvent, view) {
    console.log($('.chartjs-size-monitor'));
    $('.chartjs-size-monitor').remove();
    var big_widgets_in_block = [];
    var ul = $('.panel_big_widget').length;
    var li = $('.panel_big_widget').children('li').length;
    var request_string = "";
    for(var i = 0; i < li; i++){
        big_widgets_in_block.push($('.panel_big_widget').children('li').children('.box')[i]);
    }



    for(var i = 0; i < big_widgets_in_block.length; i++){
        var smallClassPosition = big_widgets_in_block[i].className.indexOf('small_widget');
        if(smallClassPosition !== -1){
            $('.panel_big_widget').find('.small_widget').find('.small_widget_header').css('display', 'none');
            $('.panel_big_widget').find('.small_widget').find('.big_widget_header').css('display', 'block');
            big_widgets_in_block[i].className = big_widgets_in_block[i].className.replace(/small_widget/gi, '');
            big_widgets_in_block[i].className = big_widgets_in_block[i].className.replace(/collapsed-box/gi, '');
        }

    }
    for(var i = 0, k = 0; i < ul; i++){

         for(var j = 0; j < $('.panel_big_widget')[i].children.length; j++, k++){

            request_string += "WidgetUser["+big_widgets_in_block[k].dataset.widget_name+"][active]=1&" +
                    "WidgetUser["+big_widgets_in_block[k].dataset.widget_name+"][col]="+i+"&" +
                    "WidgetUser["+big_widgets_in_block[k].dataset.widget_name+"][row]="+j +"&";
                if(big_widgets_in_block[k].className.indexOf('collapsed-box')!=-1)
                    request_string += "WidgetUser["+big_widgets_in_block[k].dataset.widget_name+"][collapsed]=1&";
                else
                    request_string += "WidgetUser["+big_widgets_in_block[k].dataset.widget_name+"][collapsed]=0&";
         }
    }

    console.log(request_string);

    console.log(big_widgets_in_block);

    $.ajax({
      type: "POST",
      url: "/core/widget-user/update-order",
      data: request_string
    }).done(function( msg ) {

    });
}
JS;


        $widgetsForSortable0 = [];
        $widgetsForSortable1 = [];
        $widgetsForSortable2 = [];
        ?>


        <div class="box box-warning" data-widget_name="Calendar">
            <div class="box-header ui-sortable-handle big_widget_header" style="cursor: move;">


                <h3 class="box-title"><i class="fa fa-calendar"></i> Календарь</h3>

                <div class="pull-right box-tools">

                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Добавить новое событие</a></li>
                            <li><a href="#">Очистить события</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Смотреть календарь <?php echo $sellingId?></a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                                class="fa fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="box-body no-padding">
                <?= \yii2fullcalendar\yii2fullcalendar::widget([
                    'clientOptions' => [
                        'header' => [
                            'left' => 'prev,next today',
                            'center' => 'title',
                            'right' => 'month,agendaWeek,listWeek,timelineDay,agendaDay'
                        ],
                        'nowIndicator' => true,
                        'eventLimit' => false,
                        'selectable' => true,
                        'selectHelper' => true,
                        'selectLongPressDelay' => 1000,
                        'droppable' => true,
                        'editable' => true,
                        'select' => new JsExpression($JSCode),
                        'eventClick' => new JsExpression($JSEventClick),
                        'eventResize' => new JsExpression($JSEventResize),
                        'eventDrop' => new JsExpression($JSEventDrop),
                        'defaultView' => $_GET['defaultView'] ?? 'month',
                        'timeFormat'=> 'h:mm',
                    ],
                    'events' => Url::to(['/event/event/jsoncalendar'])
                ]);
                ?>
            </div>

            <div class="box-footer text-black">

            </div>

            <div class="box-header ui-sortable-handle small_widget_header" style="display: none">
                <h3 class="box-title" data-toggle="tooltip" data-placement="top" title="Календарь"><i class="fa fa-calendar"></i></h3>
            </div>
        </div
        <br>

           <?php Modal::end(); ?>

        <div class="row" style="margin-top: 10px">
            <div class="col-xs-12">
                <button style="visibility: hidden" class="btn btn-success btn-lg btn-block" id="end_talk">
                    Завершить разговор
                </button>
            </div>
        </div>
        <?php ActiveForm::end()?>
        <?php DetachedBlock::end(); ?>
    </div>
</div>
<script>

</script>
<script>
    mBut.onclick = function (e) {
        if (next_step.value === '') {
            alert('Заполните "Следующий шаг" перед тем как перейти к работе с календарем');
            e.stopPropagation();
            return false;
        }
    }

    hash.onclick = function (e) {
        $.ajax({
            url: '/hash',
            type: 'POST',
            dataType: 'JSON',
            data: '',
            success: function (data) {
                results = $.map(data, function (entry) {
                    if (entry.hash_for_event == <?php echo $hash_for_event?>)
                        return true;
                });
                if (results == 'true') {
                    document.getElementById('end_talk').style.visibility = 'visible';
                }
                //alert(results);
            },
            error: function (errormessage) {

                //do something else
                alert("not working");

            }
        });
    }

    $(function (){
        $(document).ready(function() {

            window.dialog = [];

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
                    if (value[1] !== 0) {
                        dialog += '<div style="background: #c5ddfc;" class="alert alert-primary" role="alert">' + ((value[2] == 1) ? 'Клиент' : 'Менеджер') + ': <p>' + getRequest(value[0])
                            + '</p></div>' +
                            '<div style="background: #c5ddfc;" class="alert alert-primary" role="alert">' + ((value[2] == 1) ? 'Менеджер' : 'Клиент') + ': <p>' + getAnswer(value[1]) + '</p></div>';
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

            $('.selected-item-one')
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

            $('.selected-item-two')
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


            $('#end_talk').on('click', function () {
                $.ajax({
                    url: '/selling/talk/save-dialog-answer',
                    type: 'POST',
                    data: {dialog: getDialog(), sellingId: <?= $sellingId ?>}
                });
                localStorage.clear();
            });
        });

    })
</script>
