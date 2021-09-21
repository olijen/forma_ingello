<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\customersource\CustomerSource */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Источники клиента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-source-view">
    <?php BoxWidget::begin([
    'title'=>'Источник клиента: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Источник клиента?',
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
					'order',
					'description',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
