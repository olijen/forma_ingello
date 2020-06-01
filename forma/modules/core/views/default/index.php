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
?>

<script>
    var small_widgets_in_block = [];
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
JS;

$JSUpdateBigWidgets = <<<JS
function(calEvent, jsEvent, view) {
    big_widgets_in_block = [];
    var ul = $('.panel_big_widget').length;
    var li = $('.panel_big_widget').children('li').length;
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
    
    
    console.log(big_widgets_in_block);
}
JS;



$widgetsForSortable1 = [];
$widgetsForSortable2 = [];
?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>

<script>
    $('.box').on('removed.boxwidget', function(){
        console.log('удалили блок');
    });
</script>

<style>
    .small_widgets .sortable li{
        min-height: 20px;
        max-width: 400px;
    }

    .small_widgets .sortable .sortable-placeholder {
        min-height: 80px;
    }

    .sortable {
        min-height: 50px;
    }

    .sortable > li{
        min-height: 150px;
        width: 100%;
    }

    .users-list > li {
        border: none;
        margin: 0;
    }

    .panel_big_widget.sortable h3,
    #panel_small_widget.sortable h3{
        cursor: grabbing;
    }

    .panel_big_widget.sortable .users-list li {
        cursor: auto;
    }

    .panel_big_widget.sortable .disabled,
    #panel_small_widget.sortable .disabled{
        cursor: auto;
        opacity: 1;
    }

    .row.small_widgets {
        min-height: 50px;
        position: fixed;
        z-index: 99;
        background: #fff;
        width: 100%;
        top: 0;
    }

    .row.small_widgets > h3 {
        text-align: right;
        position: relative;
        right: 100px;
        margin-bottom: 20px;
    }
</style>

<div class="row small_widgets" style="min-height: 50px;">
    <h3>Свёрнутые виджеты</h3>
    <?php
    echo Sortable::widget([
        'connected' => true,
        'type' => 'grid',
        'pluginEvents' => [
            'sortupdate' => $JSUpdateSmallWidgets,
        ],
        'options' => ['id' => 'panel_small_widget'],
        'items'=> []
    ]);?>
</div>

<div class="row" style="margin-top: 100px">
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
        $widgetsForSortable1[] = ['content' => $departmentPerfomanceWidget, 'disabled' => true];
        //echo $wdf;
        //Yii::debug($wdf);
        ?>

        <!-- ПРОДАЖИ ЗА НЕДЕЛЮ -->
        <?php
        $weeklySalesWidget = \forma\modules\core\widgets\WeeklySalesWidget::widget() ;
        $widgetsForSortable1[] = ['content' => $weeklySalesWidget, 'disabled' => true];
        //echo $wws;
        //Yii::debug($wws);
        ?>

        <!-- СОТРУДНИКИ  -->
        <?php
        $employeesWidget = \forma\modules\core\widgets\EmployeesWidget::widget(['directoryAsset' => $directoryAsset]) ;
        $widgetsForSortable1[] = ['content' => $employeesWidget, 'disabled' => true];
        //echo $we;
        //Yii::debug($we);
        ?>

        <!-- СООБЩЕНИЯ  -->
        <?php
        $messagesWidget = \forma\modules\core\widgets\MessagesWidget::widget() ;
        $widgetsForSortable1[] = ['content' => $messagesWidget, 'disabled' => true];
        //echo $wm;
        //Yii::debug($wm);
        ?>

        <?php


        //var_dump($widgetsForSortable1);
        echo Sortable::widget([
                'connected' => true,
                'type' => 'grid',
            'pluginEvents' => [
                'sortupdate' => $JSUpdateBigWidgets,
            ],
            'options' => ['class' => 'panel_big_widget'],
            'items'=> $widgetsForSortable1,


        ]);?>

    </div>


    <div class="col-md-6">
        <!-- ВЫПОЛНЕНИЕ ПЛАНА ПОСТАВОК -->
        <?php
        $deliveryPlanWidget = \forma\modules\core\widgets\DeliveryPlanWidget::widget() ;
        $widgetsForSortable2[] = ['content' => $deliveryPlanWidget, 'disabled' => true];
        //echo $wdp;
        //Yii::debug($wdp);
        ?>

        <!-- ВЫПОЛНЕНИЕ ЦЕЛЕЙ -->
        <?php
        $goalsWidget = \forma\modules\core\widgets\GoalsWidget::widget() ;
        $widgetsForSortable2[] = ['content' => $goalsWidget, 'disabled' => true];
        //echo $wg;
        //Yii::debug($wg);
        ?>

        <!-- КАЛЕНДАРЬ -->
        <?php
        $calendarWidget = \forma\modules\core\widgets\CalendarWidget::widget(["JSCode" => $JSCode,
            "JSEventClick" => $JSEventClick,
            "JSEventResize" => $JSEventResize,
            "JSEventDrop" => $JSEventDrop]) ;
        $widgetsForSortable2[] = ['content' => $calendarWidget, 'disabled' => true];
        //echo $wc;
        //Yii::debug($wc);
        ?>

        <!-- ПОСТАВЩИКИ НА КАРТЕ -->
        <?php
        $suppliersWidget = \forma\modules\core\widgets\SuppliersWidget::widget() ;
        $widgetsForSortable2[] = ['content' => $suppliersWidget, 'disabled' => true];
        //echo $ws;
        //Yii::debug($ws);
        ?>

        <?php
        echo Sortable::widget([
                'connected' => true,
            'type' => 'grid',
            'pluginEvents' => [
                'sortupdate' => $JSUpdateBigWidgets,
            ],
            'options' => ['class' => 'panel_big_widget'],
            'items'=> $widgetsForSortable2,
            'disabled' => false

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

    console.log('sortable - ');
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>

<script>
    function afterAddToSmallWidgets(){
        alert(1);
        console.log(small_widgets_in_block[0].find('.box-header'));
    }

    $('.box').on('removed.boxwidget', function(e){
        console.log($('ul').find('.small_widget'));
    });

var dom = document.getElementsByClassName('panel_big_widget')[0];

    new Sortable(dom, {
        handle: '.box-title'
    });

    var dom1 = document.getElementsByClassName('panel_big_widget')[1];

    new Sortable(dom1, {
        handle: '.box-title'
    });

    var dom0 = document.getElementById('panel_small_widget');

    new Sortable(dom0, {
        handle: '.box-title'
    });


</script>
