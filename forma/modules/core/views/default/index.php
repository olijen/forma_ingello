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

/**
 * @var boolean $widgetOrder
 */

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
            $('.small_widget').find('.small_widget_header').css('display', 'flex').css('justify-content', 'center');
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
        $('.small_widget').find('.small_widget_header').css('display', 'flex').css('justify-content', 'center');
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
        $('.small_widget').find('.small_widget_header').css('display', 'flex').css('justify-content', 'center');
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
        border: none;
        min-height: 20px;
        max-width: 110px;
    }

    .small_widgets .sortable li h3{
        font-size: 48px;
    }
    .small_widgets .sortable .sortable-placeholder {
        border: 0;
        min-height: 75px;
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

    .panel_big_widget.sortable .box-header,
    #panel_small_widget.sortable .box-header{
        cursor: grabbing;
    }

    .panel_big_widget.sortable .users-list li {
        cursor: auto;
    }

    .row.small_widgets {
        min-height: 50px;
        position: fixed;
        z-index: 99;
        background: #fff;
        width: 100%;
        top: 0;
        padding: 0 36px;
        right: -12px;
    }

    .panel_big_widget.sortable .disabled,
    #panel_small_widget.sortable .disabled{
        cursor: auto;
        opacity: 1;
    }

    .row.small_widgets > h3 {
        text-align: right;
        position: relative;
        margin-bottom: 20px;
    }

    .sortable.grid .pagination li {
        border: none;
        margin: 0;
        min-height: auto;
        min-width: auto;
        padding: 0;
    }

    .sortable.grid li .dropdown-menu > li {
        border: none;
        min-height: 0px;
        padding: 1px;
        width: 95%;
    }
</style>

<?php
//ОБЪЯВЛЯЕМ ВСЕ ВИДЖЕТЫ НА ГЛАВНОЙ СТРАНИЦЕ
//воронка продаж
$salesFunnelWidget = SalesFunnelWidget::widget();
//успеваемость отдела продаж
$departmentPerfomanceWidget = DepartmentPerfomance::widget();
//недельные продажи
$weeklySalesWidget = \forma\modules\core\widgets\WeeklySalesWidget::widget();
//сотрудники
$employeesWidget = \forma\modules\core\widgets\EmployeesWidget::widget(['directoryAsset' => $directoryAsset]);
//сообщения
$messagesWidget = \forma\modules\core\widgets\MessagesWidget::widget();
//работающие сотрудники
$workers = \forma\modules\core\widgets\WorkersWidget::widget(['tableView' => false, 'searchModelWorkers' => $searchModelWorkers,
    'dataProviderWorkers' => $dataProviderWorkers]);
//продажи по складам
$salesWarehouseWidget = \forma\modules\core\widgets\SalesWarehouseWidget::widget(['sellingInWarehouse' => $sellingInWarehouse]);


//информация об отделах
$applicationInfoWidget = ApplicationInfoWidget::widget(['completeSellingsCount' => $completeSellingsCount,
    'productsCount' => $productsCount]) ;
//выполнение плана поставок
$deliveryPlanWidget = \forma\modules\core\widgets\DeliveryPlanWidget::widget();
//выполнение целей
$goalsWidget = \forma\modules\core\widgets\GoalsWidget::widget();
//календарь
$calendarWidget = \forma\modules\core\widgets\CalendarWidget::widget(["JSCode" => $JSCode,
    "JSEventClick" => $JSEventClick,
    "JSEventResize" => $JSEventResize,
    "JSEventDrop" => $JSEventDrop]);

//поставщики на карте
$suppliersWidget = \forma\modules\core\widgets\SuppliersWidget::widget();
//воронка найма
$hiringFunnelWidget = \forma\modules\core\widgets\HiringFunnelWidget::widget();
//виджет истории событий
$historyEventWidget = \forma\modules\core\widgets\SystemEventWidget::widget(['timeline' => false, 'searchModel' => $searchModelSystemEvent, 'pages' => $pages, 'systemEventsRows' => $systemEventsRows]);

/*function addToWidgetSection(string $name, $sortableArray, $widgetOrder) {
    global $departmentPerfomanceWidget;
    global $suppliersWidget;
    global $weeklySalesWidget;
    global $employeesWidget;
    global $messagesWidget;
    global $deliveryPlanWidget;
    global $goalsWidget;
    global $calendarWidget;
    global $workers;
    //Yii::debug($workers); = null
    foreach($widgetOrder as $panel => $widgetArray) {
        if($panel == $name){
            for($i = 0; $i < count($widgetArray); $i++){
                switch($widgetArray[$i]){
                    case 'DepartmentPerfomance':
                        $sortableArray[] = ['content' => $departmentPerfomanceWidget, 'disabled' => true];
                        break;
                    case 'WeeklySales':
                        $sortableArray[] = ['content' => $weeklySalesWidget, 'disabled' => true];
                        break;
                    case 'Employees':
                        $sortableArray[] = ['content' => $employeesWidget, 'disabled' => true];
                        break;
                    case 'Messages':
                        $sortableArray[] = ['content' => $messagesWidget, 'disabled' => true];
                        break;
                    case 'DeliveryPlan':
                        $sortableArray[] = ['content' => $deliveryPlanWidget, 'disabled' => true];
                        break;
                    case 'Goals':
                        $sortableArray[] = ['content' => $goalsWidget, 'disabled' => true];
                        break;
                    case 'Calendar':
                        $sortableArray[] = ['content' => $calendarWidget, 'disabled' => true];
                        break;
                    case 'Suppliers':
                        $sortableArray[] = ['content' => $suppliersWidget, 'disabled' => true];
                        break;
                    case 'Workers':
                        $sortableArray[] = ['content' => $workers, 'disabled' => true];
                        break;
                }
            }
        }
    }
    return $sortableArray;
}
$widgetsForSortable0 = addToWidgetSection('panelSmallWidget', $widgetsForSortable0, $widgetOrder);*/
Yii::debug($widgetsForSortable0);
//НАЙДЕМ СПИСОК ВИДЖЕТОВ ДЛЯ МАЛЕНЬКОЙ ПАНЕЛИ
Yii::debug('sssssss');
Yii::debug($widgetOrder);
foreach($widgetOrder as $panel => $widgetArray) {
    if($panel == 'panelSmallWidget'){
        for($i = 0; $i < count($widgetArray); $i++){
            switch($widgetArray[$i]){
                case 'SalesFunnel':
                    $widgetsForSortable0[] = ['content' => $salesFunnelWidget, 'disabled' => true];
                    break;
                case 'ApplicationInfo':
                    $widgetsForSortable0[] = ['content' => $applicationInfoWidget, 'disabled' => true];
                    break;
                case 'DepartmentPerfomance':
                    $widgetsForSortable0[] = ['content' => $departmentPerfomanceWidget, 'disabled' => true];
                    break;
                case 'WeeklySales':
                    $widgetsForSortable0[] = ['content' => $weeklySalesWidget, 'disabled' => true];
                    break;
                case 'Employees':
                    $widgetsForSortable0[] = ['content' => $employeesWidget, 'disabled' => true];
                    break;
                case 'Messages':
                    $widgetsForSortable0[] = ['content' => $messagesWidget, 'disabled' => true];
                    break;
                case 'DeliveryPlan':
                    $widgetsForSortable0[] = ['content' => $deliveryPlanWidget, 'disabled' => true];
                    break;
                case 'Goals':
                    $widgetsForSortable0[] = ['content' => $goalsWidget, 'disabled' => true];
                    break;
                case 'Calendar':
                    $widgetsForSortable0[] = ['content' => $calendarWidget, 'disabled' => true];
                    break;
                case 'Suppliers':
                    $widgetsForSortable0[] = ['content' => $suppliersWidget, 'disabled' => true];
                    break;
                case 'Workers':
                    $widgetsForSortable0[] = ['content' => $workers, 'disabled' => true];
                    break;
                case 'HiringFunnel':
                    $widgetsForSortable0[] = ['content' => $hiringFunnelWidget, 'disabled' => true];
                    break;
                case 'SalesWarehouse':
                    $widgetsForSortable0[] = ['content' => $salesWarehouseWidget, 'disabled' => true];
                    break;
                case 'HistoryEvent':
                    $widgetsForSortable0[] = ['content' => $historyEventWidget, 'disabled' => true];
                    break;
            }
        }
    }
}


//НАЙДЕМ СПИСОК ВИДЖЕТОВ ДЛЯ ДВУХ ПАНЕЛЕЙ
foreach($widgetOrder as $panel => $widgetArray) {

    if($panel == 'panelBigWidget1'){
        for($i = 0; $i < count($widgetArray); $i++){
            switch($widgetArray[$i]){
                case 'SalesFunnel':
                    $widgetsForSortable1[] = ['content' => $salesFunnelWidget, 'disabled' => true];
                    break;
                case 'ApplicationInfo':
                    $widgetsForSortable1[] = ['content' => $applicationInfoWidget, 'disabled' => true];
                    break;
                case 'DepartmentPerfomance':
                    $widgetsForSortable1[] = ['content' => $departmentPerfomanceWidget, 'disabled' => true];
                    break;
                case 'WeeklySales':
                    $widgetsForSortable1[] = ['content' => $weeklySalesWidget, 'disabled' => true];
                    break;
                case 'Employees':
                    $widgetsForSortable1[] = ['content' => $employeesWidget, 'disabled' => true];
                    break;
                case 'Messages':
                    $widgetsForSortable1[] = ['content' => $messagesWidget, 'disabled' => true];
                    break;
                case 'DeliveryPlan':
                    $widgetsForSortable1[] = ['content' => $deliveryPlanWidget, 'disabled' => true];
                    break;
                case 'Goals':
                    $widgetsForSortable1[] = ['content' => $goalsWidget, 'disabled' => true];
                    break;
                case 'Calendar':
                    $widgetsForSortable1[] = ['content' => $calendarWidget, 'disabled' => true];
                    break;
                case 'Suppliers':
                    $widgetsForSortable1[] = ['content' => $suppliersWidget, 'disabled' => true];
                    break;
                case 'Workers':
                    $widgetsForSortable1[] = ['content' => $workers, 'disabled' => true];
                    break;
                case 'HiringFunnel':
                    $widgetsForSortable1[] = ['content' => $hiringFunnelWidget, 'disabled' => true];
                    break;
                case 'SalesWarehouse':
                    $widgetsForSortable1[] = ['content' => $salesWarehouseWidget, 'disabled' => true];
                    break;
                case 'HistoryEvent':
                    $widgetsForSortable1[] = ['content' => $historyEventWidget, 'disabled' => true];
                    break;
            }
        }
    }
}

foreach($widgetOrder as $panel => $widgetArray) {
    if($panel == 'panelBigWidget2'){
        for($i = 0; $i < count($widgetArray); $i++){
            switch($widgetArray[$i]){
                case 'SalesFunnel':
                    $widgetsForSortable2[] = ['content' => $salesFunnelWidget, 'disabled' => true];
                    break;
                case 'ApplicationInfo':
                    $widgetsForSortable2[] = ['content' => $applicationInfoWidget, 'disabled' => true];
                    break;
                case 'DepartmentPerfomance':
                    $widgetsForSortable2[] = ['content' => $departmentPerfomanceWidget, 'disabled' => true];
                    break;
                case 'WeeklySales':
                    $widgetsForSortable2[] = ['content' => $weeklySalesWidget, 'disabled' => true];
                    break;
                case 'Employees':
                    $widgetsForSortable2[] = ['content' => $employeesWidget, 'disabled' => true];
                    break;
                case 'Messages':
                    $widgetsForSortable2[] = ['content' => $messagesWidget, 'disabled' => true];
                    break;
                case 'DeliveryPlan':
                    $widgetsForSortable2[] = ['content' => $deliveryPlanWidget, 'disabled' => true];
                    break;
                case 'Goals':
                    $widgetsForSortable2[] = ['content' => $goalsWidget, 'disabled' => true];
                    break;
                case 'Calendar':
                    $widgetsForSortable2[] = ['content' => $calendarWidget, 'disabled' => true];
                    break;
                case 'Suppliers':
                    $widgetsForSortable2[] = ['content' => $suppliersWidget, 'disabled' => true];
                    break;
                case 'Workers':
                    $widgetsForSortable2[] = ['content' => $workers, 'disabled' => true];
                    break;
                case 'HiringFunnel':
                    $widgetsForSortable2[] = ['content' => $hiringFunnelWidget, 'disabled' => true];
                    break;
                case 'SalesWarehouse':
                    $widgetsForSortable2[] = ['content' => $salesWarehouseWidget, 'disabled' => true];
                    break;
                case 'HistoryEvent':
                    $widgetsForSortable2[] = ['content' => $historyEventWidget, 'disabled' => true];
                    break;
            }
        }
    }
}
?>

<div class="row small_widgets" style="min-height: 50px;">
    <h3>Панель виджетов</h3>
    <?php
    echo Sortable::widget([
        'connected' => true,
        'type' => 'grid',
        'pluginEvents' => [
            'sortupdate' => $JSUpdateSmallWidgets,
        ],
        'options' => ['id' => 'panel_small_widget'],
        'items'=> $widgetsForSortable0
    ]);
    ?>
    <script>
        smallWidget();
    </script>
</div>
<div class="row small_widgets_text" style="display: none; color: red;">
    Конструктор виджетов не доступен на мобильных устройствах.
    Используйте большой экран, чтобы создать свою панель управления с помощью перетаскивания!
</div>

<div class="row first_block">
    <!-- ВОРОНКА ПРОДАЖ -->
    <?php
    //$salesFunnelWidget = SalesFunnelWidget::widget();
    //$widgetsForSortable[]['content'] = $salesFunnelWidget;
    //echo $salesFunnelWidget;
    //Yii::debug($wsf);
    ?>

    <!-- ИНФОРМАЦИЯ ОБ ОТДЕЛАХ -->
    <?php
    //$applicationInfoWidget = ApplicationInfoWidget::widget(['completeSellingsCount' => $completeSellingsCount,
    //    'productsCount' => $productsCount]) ;
    //$widgetsForSortable[]['content'] = $applicationInfoWidget;
    //echo $applicationInfoWidget;
    //Yii::debug($wap);
    ?>


</div>









<?php

$col = 0;
$row = 0;
$active = 1;
$collapsed = 0;
?>
<div class="row">
    <div class="col-md-6">

        <!-- ВОРОНКА ПРОДАЖ -->
        <?php
        if($widgetNewOrder == true) {
            $widgetsForSortable1[] = ['content' => $salesFunnelWidget, 'disabled' => true];
            $widgetOrder[] = ['SalesFunnel', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wdf;
        //Yii::debug($wdf);
        ?>

        <!-- УСПЕВАВАЕМОСТЬ ОТДЕЛА ПРОДАЖ -->
        <?php
        if($widgetNewOrder == true) {
            $widgetsForSortable1[] = ['content' => $departmentPerfomanceWidget, 'disabled' => true];
            $widgetOrder[] = ['DepartmentPerfomance', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wdf;
        //Yii::debug($wdf);
        ?>

        <!-- ПРОДАЖИ ЗА НЕДЕЛЮ -->
        <?php
        $weeklySalesWidget = \forma\modules\core\widgets\WeeklySalesWidget::widget() ;

        if($widgetNewOrder == true) {
            $widgetsForSortable1[] = ['content' => $weeklySalesWidget, 'disabled' => true];
            $widgetOrder[] = ['WeeklySales', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wws;
        //Yii::debug($wws);
        ?>

        <!-- СОТРУДНИКИ  -->
        <?php


        if($widgetNewOrder == true) {
            $widgetsForSortable1[] = ['content' => $employeesWidget, 'disabled' => true];
            $widgetOrder[] = ['Employees', $active, $row, $col, $collapsed];
            $row++;

        }
        //echo $we;
        //Yii::debug($we);
        ?>

        <!-- СООБЩЕНИЯ  -->
        <?php


        if($widgetNewOrder == true) {
            $widgetsForSortable1[] = ['content' => $messagesWidget, 'disabled' => true];
            $widgetOrder[] = ['Messages', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wm;
        //Yii::debug($wm);
        ?>


        <!-- Работающие сотрудники -->
        <?php

        if($widgetNewOrder == true) {
            $widgetsForSortable1[] = ['content' => $workers, 'disabled' => true];
            $widgetOrder[] = ['Workers', $active, $row, $col, $collapsed];
            $row++;
        }
        ?>

        <!-- Продажи по складам -->
        <?php

        if($widgetNewOrder == true) {
            $widgetsForSortable1[] = ['content' => $salesWarehouseWidget, 'disabled' => true];
            $widgetOrder[] = ['SalesWarehouse', $active, $row, $col, $collapsed];
            $row = 0;
            $col = 1;
        }
        ?>

        <?php


        echo Sortable::widget([
            'connected' => true,
            'type' => 'grid',
            'pluginEvents' => [
                'sortupdate' => $JSUpdateBigWidgets,
            ],
            'itemOptions'=>['class'=>'disabled'],
            'options' => ['class' => 'panel_big_widget first'],
            'items'=> $widgetsForSortable1,


        ]);?>

    </div>


    <div class="col-md-6">


        <!-- ИНФОРМАЦИЯ ОБ ОТДЕЛАХ -->
        <?php


        if($widgetNewOrder == true) {
            $widgetsForSortable2[] = ['content' => $applicationInfoWidget, 'disabled' => true];
            $widgetOrder[] = ['ApplicationInfo', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wdp;
        //Yii::debug($wdp);
        ?>
        <!-- ВЫПОЛНЕНИЕ ПЛАНА ПОСТАВОК -->
        <?php


        if($widgetNewOrder == true) {
            $widgetsForSortable2[] = ['content' => $deliveryPlanWidget, 'disabled' => true];
            $widgetOrder[] = ['DeliveryPlan', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wdp;
        //Yii::debug($wdp);
        ?>

        <!-- ВЫПОЛНЕНИЕ ЦЕЛЕЙ -->
        <?php


        if($widgetNewOrder == true) {

            $widgetsForSortable2[] = ['content' => $goalsWidget, 'disabled' => true];
            $widgetOrder[] = ['Goals', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wg;
        //Yii::debug($wg);
        ?>

        <!-- КАЛЕНДАРЬ -->
        <?php
        if($widgetNewOrder == true) {

            $widgetsForSortable2[] = ['content' => $calendarWidget, 'disabled' => false];
            $widgetOrder[] = ['Calendar', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $wc;
        //Yii::debug($wc);
        ?>

        <!-- ПОСТАВЩИКИ НА КАРТЕ -->
        <?php


        if($widgetNewOrder == true) {
            $widgetsForSortable2[] = ['content' => $suppliersWidget, 'disabled' => true];
            $widgetOrder[] = ['Suppliers', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $ws;
        //Yii::debug($ws);
        ?>

        <?php


        if($widgetNewOrder == true) {
            $widgetsForSortable2[] = ['content' => $hiringFunnelWidget, 'disabled' => true];
            $widgetOrder[] = ['HiringFunnel', $active, $row, $col, $collapsed];
            $row++;
        }
        //echo $ws;
        //Yii::debug($ws);
        ?>

        <?php


        if($widgetNewOrder == true) {
            $widgetsForSortable2[] = ['content' => $historyEventWidget, 'disabled' => true];
            $widgetOrder[] = ['HistoryEvent', $active, $row, $col, $collapsed];
            $row++;
        }
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
            'itemOptions'=>['class'=>'disabled'],
            'options' => ['class' => 'panel_big_widget second'],
            'items'=> $widgetsForSortable2,


        ]);?>

    </div>


</div>

<script>
    let sortItems = $("#sortItems").childNodes;
</script>

<div class="col-md-6">

</div>

<script>
    var salesInWeek = [];
</script>

<?php
for($i = 1; $i < count($salesInWeek); $i++){?>
    <script>
        salesInWeek.push(<?=$salesInWeek[$i]?>);
    </script>
    <?php
}
?>
<script>
    salesInWeek.push(<?=$salesInWeek[0]?>);
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
                data: salesInWeek,
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

    // new Chart(document.getElementById("post").getContext('2d'), {
    //     type: 'pie',
    //     data: {
    //         labels: ["Поставщик 1", "Поставщик 2", "Поставщик 3", "Поставщик 4"],
    //         datasets: [{
    //             label: 'Единиц поставки',
    //             data: [1000, 140, 270, 750],
    //             backgroundColor: [
    //                 'rgba(221, 75, 57, 1)',
    //                 'rgba(0, 166, 90, 1)',
    //                 'rgba(60, 141, 188, 1)',
    //                 'rgba(243, 156, 18, 1)',
    //             ],
    //         }]
    //     },
    //     options: options
    // });

    //myLineChart = new Chart(document.getElementById("plan").getContext('2d'), {
    //    type: 'bar',
    //    data: {
    //        labels: [<?//=$salesProgress->getLabelsString()?>//],
    //
    //        datasets: [{
    //            label: 'Количество продаж',
    //            data: [<?//=$salesProgress->getDataString()?>//],
    //            backgroundColor: [<?//=$salesProgress->getColorsString()?>//],
    //        }]
    //    },
    //    options: options
    //});
    //
    //
    //function getId(index) {
    //  return [<?//=$salesProgress->getComaListOfSales()?>//][index];
    //}
    //
    //plan.onclick = function(evt){
    //    var activePoints = myLineChart.getElementsAtEvent(evt);
    //    console.log(activePoints);
    //     window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index)) ;
    //};

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
        console.log(small_widgets_in_block[0].find('.box-header'));
    }

    $('.box').on('removed.boxwidget', function(e){
        console.log($('ul').find('.small_widget'));
    });

    var dom = document.getElementsByClassName('panel_big_widget')[0];

    var dom0 = document.getElementById('panel_small_widget');

    var dom1 = document.getElementsByClassName('panel_big_widget')[1];

    if (window.innerWidth >= 168) {
        new Sortable(dom, {
            handle: '.box-header'
        });

        new Sortable(dom1, {
            handle: '.box-header'
        });

        new Sortable(dom0, {
            handle: '.box-header'
        });
        console.log(1324567);
    }
    else {
        console.log('РАзмер экрана телефона');
    }


    function setWidgetCollapse(){
        var big_widgets_in_block = [];
        var ul = $('.panel_big_widget').length;
        var li = $('.panel_big_widget').children('li').length;
        var request_string = "";
        for(var i = 0; i < li; i++){
            big_widgets_in_block.push($('.panel_big_widget').children('li').children('.box')[i]);
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

    $("[data-widget = collapse]").click(function (){
        setTimeout(setWidgetCollapse, 1000);
    });


    var collapsedWidget = [];
</script>


<?php
foreach($widgetOrder['collapsedWidgets'] as $widgetName) { ?>
    <script>
        collapsedWidget.push('<?=$widgetName?>');
    </script>
<?php }



//todo:поставить нормальный ограничитель а не цифру 8
if($widgetNewOrder == true){
    for($i = 0; $i < 14; $i++){
        $widgetUser = new \forma\modules\core\records\WidgetUser();
        $widgetUser->loadWidgets($widgetOrder[$i]);
        $widgetUser->save();
    }
}
?>

<script>
    for(var i = 0; i < collapsedWidget.length; i++){
        $("[data-widget_name = "+collapsedWidget[i]+"]")[0].className += ' collapsed-box';
        $("[data-widget_name = "+collapsedWidget[i]+"]").find('.fa-minus')[0].className = 'fa fa-plus';
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="tooltip"]').tooltip({
            open: function (e, o) {
                $(o.tooltip).mouseover(function (e) {
                    $('[data-toggle="tooltip"]').tooltip('close');
                });
                setTimeout(function () {
                    $('[data-toggle="tooltip"]').tooltip('close'); //close the tooltip
                }, 3000);
                $(o.tooltip).mouseout(function (e) {});
            },
            close: function (e, o) {},
            show: {
                duration: 800
            }
        });

    })
</script>

<style>
    .sortable-placeholder {
        margin-top: 15px !important;
        border: 3px dotted #18a718 !important;
        background-color: #4f8e4f !important;
    }

    #panel_small_widget {
        margin: 0 !important;
        white-space: nowrap !important;
    }

    #panel_small_widget li {
        display: inline-block  !important;
        margin: 0px !important;
        padding: 0px !important;
        padding-right: 15px !important;
    }

    #panel_small_widget .box {
        margin: 0 !important;
    }
    .content-wrapper {
        min-height: 100% !important;
    }


    .first_block {
        margin-top: 100px;
    }

    @media screen and (max-width: 768px) {
        .small_widgets {
            display: none;
        }

        .small_widgets_text {
            display: block !important;
            padding-left: 20px;
        }

        .first_block {
            margin-top: 10px;
        }
        .box-title {
            max-width: 73%;
            white-space: nowrap !important;
            overflow: hidden;
        }

        .dropdown-menu {
            width: 100% !important;
        }
    }

    .sortable.grid {
        border: 0 !important;
    }

    .small_widgets #panel_small_widget.sortable.grid {
        border: 2px dashed rgba(0,0,0,0.9) !important;
        border-radius: 10px;
        padding: 10px;
    }

    .sortable.grid li {
        text-align: left !important;
        border: 0;
    }

    .container-fluid {
        padding: 0;
    }
    .col-md-6 {
        padding: 0;
    }

    li.disabled {
        margin: 0;
    }

    .sortable.grid {
        margin: 0;
    }
</style>

<script>
    $('.chartjs-size-monitor').remove();
</script>