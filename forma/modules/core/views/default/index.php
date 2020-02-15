<?php

use yii\helpers\Url;
use yii\web\JsExpression;

$this->title = 'Панель управления';
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
/** @var forma\modules\selling\forms\SalesProgress $salesProgress */

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
<div class="row">

    <div class="col-lg-9 col-xs-12">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title" id="scroll">Этапы (воронка продаж)</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <div class="chart">
                    <canvas id="plan" style=""></canvas>
                </div>
            </div>

        </div>

    </div>

    <div class="col-lg-3 col-xs-12">

        <div class="col-lg-12 col-xs-6">

            <?= \insolita\wgadminlte\LteSmallBox::widget([
                'type' => \insolita\wgadminlte\LteConst::COLOR_YELLOW,
                'title' => $completeSellingsCount,
                'text' => 'Продажи',
                'icon' => 'fa fa-arrows-alt',
                'footer' => 'Смотреть все',
                'link' => Url::to(['/selling/main', 'SellingSearch[state]' => 1]),
            ]); ?>

        </div>

        <div class="col-lg-12 col-xs-6">

            <?= \insolita\wgadminlte\LteSmallBox::widget([
                'type' => \insolita\wgadminlte\LteConst::COLOR_RED,
                'title' => $productsCount,
                'text' => 'Продукты',
                'icon' => 'fa fa-cube',
                'footer' => 'Смотреть все',
                'link' => Url::to(['/product/product']),
            ]); ?>

        </div>

        <div class="col-lg-12 col-xs-6">

            <?= \insolita\wgadminlte\LteSmallBox::widget([
                'type' => \insolita\wgadminlte\LteConst::COLOR_LIGHT_BLUE,
                'title' => '<h4>6,722,152</h4>',
                'text' => 'Оборот',
                'icon' => 'fa fa-retweet',
                'footer' => 'Смотреть детали',
                'link' => Url::to(['/selling/main', 'SellingSearch[state]' => 8]),
            ]); ?>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Успеваемость отдела продаж</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="plan1"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Продажи за неделю</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="sales"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Команда</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user1-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Виталий</a>
                        <span class="users-list-date">Today</span>
                    </li>
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user8-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Владимир</a>
                        <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user7-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Кристина</a>
                        <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user6-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Олег</a>
                        <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Александр</a>
                        <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user5-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Виктор</a>
                        <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Анастасия</a>
                        <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                        <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Надежда</a>
                        <span class="users-list-date">15 Jan</span>
                    </li>
                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Смотреть всю команду</a>
            </div>
            <!-- /.box-footer -->
        </div>

        <?php
        \insolita\wgadminlte\LteChatBox::begin([
            'type' => \insolita\wgadminlte\LteConst::TYPE_PRIMARY,
            'footer'=>'<input type="text" name="newMessage"><input class="btn submit-message" value="Отправить">',
            'title'=>'Сообщения',
            'boxTools' => '
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
                <button class="btn btn-xs"><i class="fa fa-refresh"></i></button>'
        ]);
        echo \insolita\wgadminlte\LteChatMessage::widget([
            'isRight' => false,
            'author' => 'Атрур Кольдара',
            'message' => 'Я всё проверил 10 раз, всё идеально работает.',
            'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user3-128x128.jpg',
            'createdAt' => '5 минут назад'
        ]);
        echo  \insolita\wgadminlte\LteChatMessage::widget([
            'isRight' => true,
            'author' => 'Овик Болгаровский',
            'message' => '#421+40',
            'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user8-128x128.jpg',
            'createdAt' => '2017-23-03 17:33'
        ]);
        echo  \insolita\wgadminlte\LteChatMessage::widget([
            'isRight' => true,
            'author' => 'Ламба Дамытанцу',
            'message' => 'Ему "бара". Весь день я рядом, но еще тебя  не видел. На мне свитер.',
            'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg',
            'createdAt' => '2017-23-03 17:33'
        ]);
        \insolita\wgadminlte\LteChatBox::end();
        ?>

    </div>

    <div class="col-md-6">

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Выполнение плана поставок</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="post"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Выполнение целей</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="clearfix">
                    <span class="pull-left">#121 План на неделю</span>
                    <small class="pull-right">90%</small>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">#565 Цель месяца</span>
                    <small class="pull-right">70%</small>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                </div>
                <div class="clearfix">
                    <span class="pull-left">#320 Задачи по офису</span>
                    <small class="pull-right">60%</small>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">#421 Разработка CMS</span>
                    <small class="pull-right">40%</small>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-warning">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="fa fa-calendar"></i>

                <h3 class="box-title">Календарь</h3>

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
                    <button type="button" class="btn btn-warning btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-warning btn-sm" data-widget="remove"><i
                            class="fa fa-times"></i>
                    </button>
                </div>

            </div>

            <div class="box-body no-padding">
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
                        'defaultView' => $_GET['defaultView'] ?? 'month',
                    ],
                    'events' => Url::to(['/event/event/jsoncalendar'])
                ]);
                ?>
            </div>

            <div class="box-footer text-black">

            </div>
        </div>

        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Поставщики на карте</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <!-- Chat box -->
                <div class="">

                    <!-- Map box -->
                    <?= yii2mod\google\maps\markers\GoogleMaps::widget([
                        'userLocations' => \forma\modules\product\records\Manufacturer::getLocations(),
                        'wrapperHeight' => '300px',
                    ]); ?>
                    <!-- /.box -->

                </div>

                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Users</a>
            </div>
            <!-- /.box-footer -->
        </div>

    </div>

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

    new Chart(document.getElementById("plan").getContext('2d'), {
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