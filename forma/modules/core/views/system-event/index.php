<?php

use forma\modules\core\components\LinkHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use nex\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\SystemEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $systemEventsRows */

$this->title = 'История событий';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .content p button#event_user_view {
        border: none;
        color: #fff;
        float: right;
    }

    .btn-event {
        background-color: #00b65d;
        color: #fff;
    }

    .btn-event:hover,
    .btn-event:focus,
    .btn-event:active{
        color: #fff;
    }
</style>

<div class="system-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Подписаться на события', ['/core/system-event-user/subscribe'], ['class' => 'btn btn-event']) ?>
        <button id="event_user_view" class="btn btn-event" onclick="changeSystemEventView()">
            Показать таблицей
        </button>
    </p>


    <script>
        let view = 'list';
    </script>
    <?php Pjax::begin();
    //todo: последняя точка остановки, отследить Pjax запрос при вводе поля?>




    <div id="system_event_table">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            ['class' => 'yii\grid\ActionColumn'],

            'date_time',
            'application',
            'module',
            'data',


        ],
    ]); ?>
    </div>
    <div id="system_event_list" style="margin-top: 30px">
        <div class="search_event" style="display:none">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <button class="btn btn-event buttonSearch" onclick="showSearch(this)">
            Поиск по событиям
        </button>
    <ul class="timeline" style="margin-top: 15px;">
        <?php

        $eventDate = "";
        $icon = "";
        foreach ($dataProvider->models as $model) {
            foreach(Yii::$app->params['icons'] as $kIcon => $vIcon){
                if($model->class_name == $kIcon){
                    $icon = $vIcon;
                }
            }
            $color = "";
            foreach(Yii::$app->params['colors'] as $app => $colorValue) {
                if($model->application == $app) $color = $colorValue;
            }
            $arr = [];
            $linkView = "";
            $event = "";
            if(strlen($model->request_uri) > 0 && $model->sender_id >= 1) {
                $arr = explode("/", $model->request_uri);
                $linkView = "/" . $arr[1] . "/" . $arr[2];
                if(count($arr) > 3)$event = substr($arr[3], 0, 6);
            }

            // исключения на ссылки по объектам
            if(isset($arr[1]) && $arr[1]=='selling' && ($arr[2] == 'form' || $arr[2] == 'talk')) $linkView = '/selling/main';




            if($eventDate != substr($model->date_time, 0, 10)){
                ?>

                <!-- timeline time label -->
                <li class="time-label">
        <span class="bg-red">
            <?=substr($model->date_time, 0, 10)?>
        </span>
                </li>
            <?php }?>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <i class="fa fa-<?=$icon!=""? $icon : 'envelope'?>" style="background-color: <?=$color?>; color: #fff"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?=substr($model->date_time, 11, 5)?></span>

                    <h3 class="timeline-header">В отделе <a href="#"><?=$model->application?></a> произошло событие</h3>
                    <div class="timeline-body">
                        <?=$model->data?>
                    </div>
                    <?php if($model->class_name != 'Login' && $model->class_name != 'WarehouseUser' && $model->class_name != 'RequestStrategy'
                    && $model->class_name != 'WorkerVacancy') { ?>
                    <div class="timeline-footer">
                        <p>Посмотреть список в модуле: <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."||" .$model->class_name."}}")) ?></p>

                        <?php
                        //в объекте используем replaceUrlOnButtonAmp чтобы к GET['id'] который стоит в начале запроса подставлялся &without-header
                            if($linkView == '/selling/main'){
                                $linkView = '/selling/form';?>
                                <p><?php if($event != "delete"){?>Посмотреть на объект: <?php LinkHelper::replaceUrlOnButtonAmp(" {{".Url::to($linkView."/?id=".$model->sender_id."||" .$model->class_name."}}")) ?><?php }?></p>
                        <?php } else {
                        ?>



                        <p><?php if($event != "delete"){?>Посмотреть на объект: <?php LinkHelper::replaceUrlOnButtonAmp(" {{".Url::to($linkView."/update?id=".$model->sender_id."||" .$model->class_name."}}")) ?><?php }?></p>
                        <?php }?>
                    </div>
                    <?php } ?>
                </div>
            </li>
            <!-- END timeline item -->
            <?php
            $eventDate = substr($model->date_time, 0, 10);
        }
        ?>
    </ul>
       <?php echo LinkPager::widget([
        'pagination' => $pages,
        ]); ?>
    </div>

    <script>
        if (view === 'table') {
            $("#system_event_list").hide();
        }
        else {
            $("#system_event_table").hide();
        }
    </script>

    <?php
        if (Yii::$app->request->get('SystemEventSearch')){?>
            <script>
                document.getElementsByClassName('search_event')[0].style.display = 'block';
                document.getElementsByClassName('buttonSearch')[0].innerText = 'Скрыть поиск';
            </script>
    <?php    }
    ?>
    <?php Pjax::end(); ?>
    <script>
        let table = $("#system_event_table");
        let list = $("#system_event_list");
        console.log(view);
        if(view === 'table') {
            list.hide();
        }
        else {
            table.hide();
        }
        function changeSystemEventView(){
            let table = $("#system_event_table");
            let list = $("#system_event_list");
            console.log(table);
            if(view === 'table') {
                table.hide();
                list.show();
                view = 'list';
                $("#event_user_view")[0].innerText = 'Показать таблицей';
            }
            else {
                table.show();
                list.hide();
                view = 'table';
                $("#event_user_view")[0].innerText = 'Показать списком';
            }
        }
    </script>

</div>


<script>
    function showSearch(e){
        if(e.innerText == 'Поиск по событиям') {
            document.getElementsByClassName('search_event')[0].style.display = 'block';
            e.innerText = 'Скрыть поиск';
        }
        else {
            document.getElementsByClassName('search_event')[0].style.display = 'none';
            e.innerText = 'Поиск по событиям';
        }
    }
</script>
