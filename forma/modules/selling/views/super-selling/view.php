<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\superselling\Selling */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-view">
    <?php BoxWidget::begin([
    'title'=>'Продажа: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Продажа?',
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
					'customer_id',
					'warehouse_id',
					'state_id',
					'name',
					'date_create',
					'date_complete',
					'dialog:ntext',
					'next_step:ntext',
					'selling_token',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
