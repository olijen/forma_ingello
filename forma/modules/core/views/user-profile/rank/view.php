<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rank */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ранги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-view">
    <?php BoxWidget::begin([
    'title'=>'Ранг: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Ранг?',
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
					'name:ntext',
					'image:ntext',
					'order',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
