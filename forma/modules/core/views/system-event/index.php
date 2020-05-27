<?php

use forma\modules\core\components\LinkHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\SystemEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $systemEventsRows */

$this->title = 'История событий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Подписаться на события', ['/core/system-event-user/subscribe'], ['class' => 'btn btn-danger']) ?>
    </p>

    <button id="event_user_view" onclick="changeSystemEventView()">
        table
    </button>
    <script>
        let view = 'table';
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
    <div id="system_event_list">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <ul class="timeline">
        <?php
        /*$ccc = 0;
        $all = [];
        echo "<pre>";
        $objColor = [];
        foreach(Yii::$app->params['menu'] as $applications){
            foreach($applications as $aKeys => $aValues){
                if($aKeys == 'url') {
                    $objName = explode("/", $aValues[0]);
                    $objName = (ucfirst($objName[count($objName)-1]) != "" && ucfirst($objName[count($objName)-1]) != "Main" && ucfirst($objName[count($objName)-1]) != "Default") ? ucfirst($objName[count($objName)-1]) : ucfirst($objName[count($objName)-2]);
                    $objColor[$objName] = $applications['icon'];
                    $all[] = $objName;
                }
                if($aKeys == 'items'){
                    foreach ($aValues as $ItemKey => $ItemValue) {

                        foreach ($ItemValue as $key => $value) {
                            if($key == 'url') {
                                echo "-------------";
                                echo "$key = ";
                                echo $ccc++;
                                var_dump($value);
                                var_dump($ItemValue);
                                echo "--------------";

                                $objName = explode("/", $value[0]);
                                $objName = (ucfirst($objName[count($objName)-1]) != "" && ucfirst($objName[count($objName)-1]) != "Main" && ucfirst($objName[count($objName)-1]) != "Default") ? ucfirst($objName[count($objName)-1]) : ucfirst($objName[count($objName)-2]);
                                $objColor[$objName] = $ItemValue['icon'];
                                $all[] = $objName;

                            }
                        }
                    }
                }
            }
        }

        print_r($objColor);
        echo "-----------------";
        var_dump(array_unique($all));
        echo "</pre>";*/

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
            if(strlen($model->request_uri) > 0 && $model->sender_id != 1) {
                $arr = explode("/", $model->request_uri);
                $linkView = "/" . $arr[1] . "/" . $arr[2];
                if(count($arr) > 3)$event = substr($arr[3], 0, 6);
            }
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
                    <?php if($model->sender_id !=1) { ?>
                    <div class="timeline-footer">
                        <p>Посмотреть список в модуле: <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."||" .$model->class_name."}}")) ?></p>

                        <p><?php if($event != "delete"){?>Посмотреть на объект: <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."/update?id=".$model->sender_id."||" .$model->class_name."}}")) ?><?php }?></p>
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
                $("#event_user_view")[0].innerText = 'list';
            }
            else {
                table.show();
                list.hide();
                view = 'table';
                $("#event_user_view")[0].innerText = 'table';
            }
        }
    </script>

</div>

