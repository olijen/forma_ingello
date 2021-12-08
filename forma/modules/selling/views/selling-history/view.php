<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\sellinghistory\SellingHistory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Истории продаж', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-history-view">
    <?php BoxWidget::begin([
    'title'=>'История продаж: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Историю продаж?',
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
					'date:date',
					'date_from',
					'date_to',
					'count',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
