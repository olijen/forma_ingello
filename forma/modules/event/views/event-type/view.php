<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\event\records\EventType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ТипыСобытий', 'url' => ['index']];

?>
<div class="event-type-view">
    <?php BoxWidget::begin([
    'title'=>'ТипСобытия: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить ТипСобытия?',
        'method' => 'post',
      ],]],
      ['link', '<i class="fa fa-pencil" aria-hidden="true"></i>',['update','id' => $model->id],['data-toggle'=>'tooltip', 'data-original-title'=>'редактировать']],
    ]
    ]);
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
					'id',
					'name',
					'status',
					'color',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
