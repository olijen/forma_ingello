<?php
use forma\modules\core\components\LinkHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;


Yii::debug($systemEventsRows);
//todo: последняя точка остановки, отследить Pjax запрос при вводе поля?>



    <div id="system_event_list">

        <ul class="timeline">
            <?php

            $eventDate = "";
            $icon = "";
            foreach ($systemEventsRows as $model) {
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
                if (strlen($model->request_uri) > 0 && $model->sender_id != 1 && !empty($arr)) {
                    $arr = explode("/", $model->request_uri);
                    $linkView = "/" . $arr[1] . "/" . $arr[2];
                    if(count($arr) > 3)$event = substr($arr[3], 0, 6);
                }
                if(isset($arr[1]) && ($arr[1]=='selling' || $arr[1] == 'inventorization') && ($arr[2] == 'form' || $arr[2] == 'talk')) $linkView = '/'.$arr[1].'/main';
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
                                <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."||"  . "Список " ."}}")) ?>

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

