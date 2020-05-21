<?php

use forma\modules\core\components\LinkHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\SystemEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create System Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin();
    //todo: последняя точка остановки, отследить Pjax запрос при вводе поля?>


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

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

    <ul class="timeline">
        <?php
        $eventDate = "";
        foreach ($dataProvider->models as $model) {
            $arr = [];
            $linkView = "";
            $event = "";
            if(strlen($model->request_uri) > 0) {
                $arr = explode("/", $model->request_uri);
                $linkView = "/" . $arr[1] . "/" . $arr[2];
                $event = $arr[3];
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
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?=substr($model->date_time, 11, 5)?></span>

                    <h3 class="timeline-header">В отделе <a href="#"><?=$model->application?></a> произошло событие</h3>

                    <div class="timeline-body">
                        <?=$model->data?>
                    </div>

                    <div class="timeline-footer">
                        <?php echo $linkView."||" .$model->class_name?>
                        Посмотреть список в модуле: <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."||" .$model->class_name."}}")) ?>
                        <?php if($event != "delete"){?>Посмотреть на объект: <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."/update?id=".$model->sender_id."||" .$model->class_name."}}")) ?><?php }?>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
            <?php
            $eventDate = substr($model->date_time, 0, 10);
        }
        ?>
    </ul>
    <?php Pjax::end(); ?>

</div>



