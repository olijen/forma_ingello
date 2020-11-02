<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

?>
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


function editEvent(event)
{
    var ServerMapper;
    if (event.title) {
        serverMapper = {
            'Event[name]': event.title,
            'Event[text]': event.title,
            'Event[date_from]': event.start.format("YYYY-MM-DD"),
            'Event[date_to]': event.end.format("YYYY-MM-DD"),
            'Event[start_time]': event.start.format("hh:mm:ss"),
            'Event[end_time]': event.end.format("hh:mm:ss"),
            'Event[event_type_id]': 1,
            'Event[status]': 1,
        }
        $.post( "/event/event/update?json&id="+event.id, serverMapper, function( data ) {
          console.log('Сервер сохранил событие');
        }).fail(function() {
          alert("Внутренняя ошибка");
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
            'Event[date_from]': $.fullCalendar.formatDate(start,"yyyy-MM-dd"),
            'Event[date_to]': $.fullCalendar.formatDate(end,"yyyy-MM-dd"),
            'Event[start_time]': $.fullCalendar.formatDate(start,"H:m:ss"),
            'Event[end_time]': $.fullCalendar.formatDate(end,"H:m:ss"),
            'Event[event_type_id]': 4,
            'Event[status]': 1,
        }
        $.post( "/event/event/create?json", serverMapper, function( data ) {
          $('#w0').fullCalendar('renderEvent', eventData, true);
        }).fail(function() {
          alert("Внутренняя ошибка");
        });
    }
    $('#w0').fullCalendar('unselect');
}
JS;

$this->registerJs($DragJS);

$JSCode = <<<JS
function(start, end) {
    $('#modal .modal-dialog .modal-content .modal-body').load('/event/event/create?date_from='+start.format('YYYY-MM-DD')+
    '&date_to='+end.format('YYYY-MM-DD')+
    '&start_time='+start.format('H:m:ss')+
    '&end_time='+end.format('H:m:ss'));
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
    var small_widgets_in_block = [];
</script>

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
                    <li><a href="#">Смотреть календарь</a></li>
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
                'eventLimit' => true,
                'selectable' => true,
                'selectHelper' => true,
                'droppable' => true,
                'editable' => true,
                'select' => new JsExpression($JSCode),
                'eventClick' => new JsExpression($JSEventClick),
                'eventResize' => new JsExpression($JSEventResize),
                'eventDrop' => new JsExpression($JSEventDrop),
                'defaultDate' => date('Y-m-d'),
                'defaultView' => $_GET['defaultView'] ?? 'month',
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
</div>


<br>
<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-block', 'name' => 'contact-button','on-click']) ?>
</div>
