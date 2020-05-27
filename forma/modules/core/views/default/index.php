<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\sortable\Sortable;
use \forma\modules\core\widgets\ApplicationInfoWidget;
use \forma\modules\core\widgets\SalesFunnelWidget;
use \forma\modules\core\widgets\DepartmentPerfomance;
use \forma\modules\core\widgets\WeeklySalesWidget;

$this->title = 'Мониторинг отделов компании';
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');


$DragJS = <<<JS

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


$widgetsForSortable1 = [];
$widgetsForSortable2 = [];
?>

<style>
    .sortable.grid > li{
        width: 100%;
    }

    .users-list > li {
        border: none;
        margin: 0;
    }
</style>

<div class="row">
    <!-- ВОРОНКА ПРОДАЖ -->
    <?php
    $salesFunnelWidget = SalesFunnelWidget::widget();
    //$widgetsForSortable[]['content'] = $salesFunnelWidget;
    echo $salesFunnelWidget;
    //Yii::debug($wsf);
    ?>

    <!-- ИНФОРМАЦИЯ ОБ ОТДЕЛАХ -->
    <?php
    $applicationInfoWidget = ApplicationInfoWidget::widget(['completeSellingsCount' => $completeSellingsCount,
        'productsCount' => $productsCount]) ;
    //$widgetsForSortable[]['content'] = $applicationInfoWidget;
    echo $applicationInfoWidget;
    //Yii::debug($wap);
    ?>

</div>

<div class="row">
    <div class="col-md-6">
        <!-- УСПЕВАВАЕМОСТЬ ОТДЕЛА ПРОДАЖ -->
        <?php
        $departmentPerfomanceWidget = DepartmentPerfomance::widget() ;
        $widgetsForSortable1[]['content'] = $departmentPerfomanceWidget;
        //echo $wdf;
        //Yii::debug($wdf);
        ?>

        <!-- ПРОДАЖИ ЗА НЕДЕЛЮ -->
        <?php
        $weeklySalesWidget = \forma\modules\core\widgets\WeeklySalesWidget::widget() ;
        $widgetsForSortable1[]['content'] = $weeklySalesWidget;
        //echo $wws;
        //Yii::debug($wws);
        ?>

        <!-- СОТРУДНИКИ  -->
        <?php
        $employeesWidget = \forma\modules\core\widgets\EmployeesWidget::widget(['directoryAsset' => $directoryAsset]) ;
        $widgetsForSortable1[]['content'] = $employeesWidget;
        //echo $we;
        //Yii::debug($we);
        ?>

        <!-- СООБЩЕНИЯ  -->
        <?php
        $messagesWidget = \forma\modules\core\widgets\MessagesWidget::widget() ;
        $widgetsForSortable1[]['content'] = $messagesWidget;
        //echo $wm;
        //Yii::debug($wm);
        ?>

        <?php
        echo Sortable::widget([
                'connected' => true,
            'type'=>'grid',
            'items'=> $widgetsForSortable1
        ]);?>

    </div>


    <div class="col-md-6">
        <!-- ВЫПОЛНЕНИЕ ПЛАНА ПОСТАВОК -->
        <?php
        $deliveryPlanWidget = \forma\modules\core\widgets\DeliveryPlanWidget::widget() ;
        $widgetsForSortable2[]['content'] = $deliveryPlanWidget;
        //echo $wdp;
        //Yii::debug($wdp);
        ?>

        <!-- ВЫПОЛНЕНИЕ ЦЕЛЕЙ -->
        <?php
        $goalsWidget = \forma\modules\core\widgets\GoalsWidget::widget() ;
        $widgetsForSortable2[]['content'] = $goalsWidget;
        //echo $wg;
        //Yii::debug($wg);
        ?>

        <!-- КАЛЕНДАРЬ -->
        <?php
        $calendarWidget = \forma\modules\core\widgets\CalendarWidget::widget(["JSCode" => $JSCode,
            "JSEventClick" => $JSEventClick,
            "JSEventResize" => $JSEventResize,
            "JSEventDrop" => $JSEventDrop]) ;
        $widgetsForSortable2[]['content'] = $calendarWidget;
        //echo $wc;
        //Yii::debug($wc);
        ?>

        <!-- ПОСТАВЩИКИ НА КАРТЕ -->
        <?php
        $suppliersWidget = \forma\modules\core\widgets\SuppliersWidget::widget() ;
        $widgetsForSortable2[]['content'] = $suppliersWidget;
        //echo $ws;
        //Yii::debug($ws);
        ?>

        <?php
        echo Sortable::widget([
                'connected' => true,
            'type'=>'grid',
            'items'=> $widgetsForSortable2
        ]);?>

    </div>


</div>

<script>
    let sortItems = $("#sortItems").childNodes;
</script>

<div class="col-md-6">

</div>

<script>
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    new Chart(document.getElementById("sales").getContext('2d'), {
        type: 'line',
        data: {
            labels: ["ПН", "ВТ", "СР", "ЧВ", "ПТ", "СБ", "ВС"],
            datasets: [{
                label: '',
                data: [12, 19, 3, 11, 14, 0],
                border: [
                    'rgba(221, 75, 57, 1)',
                ],
                borderColor: [
                    'rgba(0, 166, 90, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: options,
    });

    new Chart(document.getElementById("post").getContext('2d'), {
        type: 'pie',
        data: {
            labels: ["Поставщик 1", "Поставщик 2", "Поставщик 3", "Поставщик 4"],
            datasets: [{
                label: 'Единиц поставки',
                data: [1000, 140, 270, 750],
                backgroundColor: [
                    'rgba(221, 75, 57, 1)',
                    'rgba(0, 166, 90, 1)',
                    'rgba(60, 141, 188, 1)',
                    'rgba(243, 156, 18, 1)',
                ],
            }]
        },
        options: options
    });

    myLineChart = new Chart(document.getElementById("plan").getContext('2d'), {
        type: 'bar',
        data: {
            labels: [<?=$salesProgress->getLabelsString()?>],

            datasets: [{
                label: 'Количество продаж',
                data: [<?=$salesProgress->getDataString()?>],
                backgroundColor: [<?=$salesProgress->getColorsString()?>],
            }]
        },
        options: options
    });


    function getId(index) {
      return [<?=$salesProgress->getComaListOfSales()?>][index];
    }

    plan.onclick = function(evt){
        var activePoints = myLineChart.getElementsAtEvent(evt);
        console.log(activePoints);
         window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index)) ;
    };

    new Chart(document.getElementById("plan1").getContext('2d'), {
        type: 'bar',
        data: {
            labels: ["Команда 1", "Команда 2", "Команда 3", "Команда 4"],
            datasets: [{
                label: 'Цели',
                data: [11, 8, 3, 2],
                backgroundColor: [
                    'rgba(0, 166, 90, 1)',
                    'rgba(0, 166, 90, 1)',
                    'rgba(0, 166, 90, 1)',
                    'rgba(0, 166, 90, 1)',
                ],
            },{
                label: 'Дисциплина',
                data: [17, 4, 1, 10],
                backgroundColor: [
                    'rgba(243, 156, 18, 1)',
                    'rgba(243, 156, 18, 1)',
                    'rgba(243, 156, 18, 1)',
                    'rgba(243, 156, 18, 1)',
                ],
            },{
                label: 'Инициатива',
                data: [11, 8, 9, 7],
                backgroundColor: [
                    'rgba(221, 75, 57, 1)',
                    'rgba(221, 75, 57, 1)',
                    'rgba(221, 75, 57, 1)',
                    'rgba(221, 75, 57, 1)',
                ],
            },]
        },
        options: options
    });
</script>
