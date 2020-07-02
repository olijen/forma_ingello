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

