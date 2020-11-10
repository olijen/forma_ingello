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

    .timeline a.btn {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .button_system {
        display: inline-block;
    }

    @media screen and (max-width: 576px) {
        .button_system {
            display: block;
        }

        .button_system button,
        .button_system a{
            display: block;
            margin-top: 20px;
            width: 100%
        }
    }
</style>

<div class="system-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <div class="button_system">
            <?= Html::a('Подписаться на события', ['/core/system-event-user/subscribe'], ['class' => 'btn btn-event']) ?>
        </div>
        <div class="button_system">
            <button id="event_user_view" class="btn btn-event" onclick="changeSystemEventView()">
                Показать таблицей
            </button>
        </div>
        <div class="button_system">
            <button class="btn btn-event buttonSearch" onclick="showSearch(this)">
                Поиск по событиям
            </button>
        </div>
    </div>


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
    <div id="system_event_list" style="margin-top: 10px">
        <div class="search_event" style="display:none">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>

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
            Yii::debug($model);
            if(strlen($model->request_uri) > 0 && $model->sender_id >= 1) {
                $arr = explode("/", $model->request_uri); $event = ""; Yii::debug($arr);
                $linkView = "/" . $arr[1] . "/" . $arr[2];
                if(count($arr) > 3)$event = substr($arr[3], 0, 6);
            }


            // исключения на ссылки по объектам
            if(isset($arr[1]) && ($arr[1]=='selling' || $arr[1] == 'inventorization') && ($arr[2] == 'form' || $arr[2] == 'talk')) $linkView = '/'.$arr[1].'/main';




            if($eventDate != substr($model->date_time, 0, 10)){
                ?>

                <!-- timeline time label -->
                <li class="time-label">
        <span class="bg-red" style="font-size: 18px; padding: 6px 10px">
            <?=substr($model->date_time, 0, 10)?>
        </span>
                </li>
            <?php }?>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li style="margin-bottom: 10px; font-size: 18px;">
                <!-- timeline icon -->
                <i class="fa fa-<?=$icon!=""? $icon : 'envelope'?>" style="background-color: <?=$color?>; color: #fff; font-size: 18px;"></i>
                <div class="timeline-item" style="font-size: 18px">
                    <span class="time"><i class="fa fa-clock-o"></i> <?=substr($model->date_time, 11, 5)?></span>

                    <h3 class="timeline-header" style="font-size: 18px">В отделе <a href="#"><?=$model->application?></a> произошло событие</h3>
                    <div class="timeline-body row" style="padding: 20px">
                      <div class="col-md-5" style="font-size: 18px">
                    <?php if($model->class_name != 'Login' && $model->class_name != 'WarehouseUser' && $model->class_name != 'RequestStrategy'
                    && $model->class_name != 'WorkerVacancy') { ?>
                     <?php echo LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."||"  . "Список " ."}}")) ?>

                        <?php
                        //в объекте используем replaceUrlOnButtonAmp чтобы к GET['id'] который стоит в начале запроса подставлялся &without-header
                            if($linkView == '/selling/main'){
                                $linkView = '/selling/form';?>
                                <?php if($event != "delete"){?> <?php LinkHelper::replaceUrlOnButtonAmp(" {{".Url::to($linkView."/?id=".$model->sender_id."||" . "Объект"."}}")) ?><?php }?>
                        <?php } else {
                        ?>



                        <?php if($event != "delete"){?> <?php LinkHelper::replaceUrlOnButtonAmp(" {{".Url::to($linkView."/update?id=".$model->sender_id."||" . "Объект"."}}")) ?><?php }?>
                        <?php }?></div>
                    <div class="col-md-7" style="padding: 5px; display: inline-block; font-size: 18px">
                            <?=$model->data?>
                        </div>
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
