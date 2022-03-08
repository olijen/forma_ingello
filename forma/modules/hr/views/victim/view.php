<?php

use wokster\ltewidgets\BoxWidget;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\models\Victim */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пострадавшие', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="victim-view">
    <?php BoxWidget::begin([
    'title'=>'Пострадавший: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Пострадавшего?',
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
					'fullname:ntext',
					'birthday',
					'is_child',
					'place_of_residence:ntext',
					'second_residence:ntext',
					'name_where_to_settle:ntext',
					'settlement_address:ntext',
					'phone:ntext',
					'registered_at',
					'stay_for:ntext',
					'questions:ntext',
					'specialization:ntext',
					'destination:ntext',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
