<?php
use yii\web\JsExpression;
use yii\helpers\Url;
?>

    <div class="box box-warning" data-widget_name="Calendar">
        <div class="box-header ui-sortable-handle big_widget_header" style="cursor: move;">
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
                <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                        class="fa fa-minus"></i>
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

        <div class="box-header ui-sortable-handle small_widget_header" style="display: none">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Календарь</h3>

        </div>
    </div>