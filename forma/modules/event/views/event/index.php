<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\event\records\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'События';

?>
<div class="event-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php BoxWidget::begin([
        'title'=>'Событие <small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
        'buttons' => [
            ['link', '<i class="fa fa-plus-circle" aria-hidden="true"></i>',['create'],['title'=>'создать Событие']]
        ]
    ]);
    ?>

    <?php Pjax::begin(['id' => 'grid'])?>

    <?=  GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'event_type_id',
            'name',
            'text:text',
            [
                'attribute' => 'status',
                'filter'=> $searchModel->getStatusList(),
            ],
            'date_from',
            'date_to',
             'start_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end();?>

    <?php BoxWidget::end();?>


</div>
