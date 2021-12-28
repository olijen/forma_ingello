<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserRuleRank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Правила рангов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rule-rank-view">
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
					'id_user_profile',
					'rule_rank_id',
					'date:date',
        ],
    ]) ?>
    <?php BoxWidget::end();?></div>
