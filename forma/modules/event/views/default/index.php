<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

?>
<?php $DragJS = <<<JS

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
            'Event[start_time]': $.fullCalendar.formatDate(start,"H:00:00"),
            'Event[end_time]': $.fullCalendar.formatDate(end,"H:00:00"),
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
    $('#modal .modal-dialog .modal-content .modal-body').load('/event/event/create?date_from='+start.format());
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
<?php

?>
</script>
<style>
    .fc-event {
        margin: 3px;
        padding: 3px;
    }
    .fullcalendar {
        -webkit-border-radius:3px;
        -moz-border-radius:3px;
        border-radius:3px;
    }
    .fc-header td {
        border: 0; !important;
    }
    .fc-button-inner {
        border: 0; !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <?= yii2fullcalendar\yii2fullcalendar::widget([
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
                'defaultView' => $_GET['defaultView'] ?? 'agendaWeek',
            ],
            'events' => Url::to(['/event/event/jsoncalendar'])
        ]);
        ?>
    </div>
</div>



