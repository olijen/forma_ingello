<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rule */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Правила', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-view">
    <?php BoxWidget::begin([
    'title'=>'Правило: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Правило?',
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
					'action',
					'model',
					'mark',
					'item_id',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
