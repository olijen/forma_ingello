<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\RankRule */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Правила рангов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-rule-view">
    <?php BoxWidget::begin([
    'title'=>'Правило ранга: просмотр',
    'buttons' => [
      ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>',['delete', 'id' => $model->id],[
        'data-toggle'=>'tooltip', 'data-original-title'=>'удалить',
        'data' => [
        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Правило ранга?',
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
					'rule_id',
					'rank_id',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>