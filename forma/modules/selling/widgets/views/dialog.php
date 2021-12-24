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


\forma\modules\selling\assets\ScriptAsset::register($this);

?>

<?php // \forma\components\widgets\ModalCreate::begin() ?>
<?php
$date = date_create();
$hash_for_event = date_timestamp_get($date);
$hostInfo = Url::home(true);
?>
<style>
    .bs-example {
        margin-top: 0;
    }
    .list-group {
        height: auto;
        padding: 3px 0;
    }
    h3.text-white {
        color: white;
        margin: 0;
        padding-top: 20px;
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
                                    <li style="cursor: pointer;" id="collapseOne-li-<?= $request->id ?>" onclick="collapseOneChildren(<?=$request->id?>)" class="list-group-item d-flex justify-content-between align-items-center selected-item">
                                        <input id ="checkbox_<?= $request->id ?>" class="form-check-input checkbox-item" type="checkbox" value="" >
                                        <?= $request->text ?>
                                        <span class="badge badge-primary badge-pill"><?=\forma\modules\selling\services\AnswerService::getCountAnswer($request)?></span>
                                    </li>
                                    <div  id="collapseOne-children_<?= $request->id ?>" class="hidden-block-selected">
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
                                    <li style="cursor: pointer;" id="collapseTwo-li-<?= $request->id ?>" onclick="collapseTowChildren(<?=$request->id?>)" class="list-group-item d-flex justify-content-between align-items-center selected-item">
                                        <input id ="checkbox_<?= $request->id ?>" class="form-check-input checkbox-item" type="checkbox" value="" >
                                        <?= $request->text ?>
                                        <span class="badge badge-primary badge-pill"><?=\forma\modules\selling\services\AnswerService::getCountAnswer($request)?></span>
                                    </li>
                                    <div  id="collapseTwo-children_<?= $request->id ?>" class="hidden-block-selected">
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
    <script>
        function collapseTowChildren(id) {
            let children = $('#collapseTwo-children_' + id);
            if (children.hasClass('hidden-block-selected') === true) {
                children.removeClass()
                children.addClass('block-selected')
            } else {
                children.removeClass('block-selected')
                children.addClass('hidden-block-selected')
            }
        }

        function collapseOneChildren(id) {
            let children = $('#collapseOne-children_' + id);
            if (children.hasClass('hidden-block-selected') === true) {
                children.removeClass()
                children.addClass('block-selected')
            } else {
                children.removeClass('block-selected')
                children.addClass('hidden-block-selected')
            }
        }
    </script>
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
            <!--<a  href='/selling/form/?id=<?php /*echo $sellingId */?>' style="visibility: hidden" class="btn btn-success btn-lg btn-block" type="submit" id="end_talk">
                Завершить разговор
            </a>-->
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

    hash.onclick = function (e){
        /*console.log(<?php echo $hash_for_event ?>)
        document.getElementById('end_talk').style.visibility = 'visible';
*/
        $.ajax({
            url: '/hash',
            type: 'POST',
            dataType: 'JSON',
            data: '',
            success: function (data) {
                results = $.map(data, function(entry) {
                    if(entry.hash_for_event == <?php echo $hash_for_event?>)
                    return true;
                });
                if(results == 'true'){
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



</script>
<?php  // \forma\components\widgets\ModalCreate::end() ?>
