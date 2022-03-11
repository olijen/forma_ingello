<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\volunteer\Volunteer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Волонтеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="volunteer-view">
    <?php BoxWidget::begin([
        'title' => 'Волонтер: просмотр',
        'buttons' => [
            ['link', '<i class="fa fa-times text-danger" aria-hidden="true"></i>', ['delete', 'id' => $model->id], [
                'data-toggle' => 'tooltip', 'data-original-title' => 'удалить',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите безвозвратно удалить Валантера?',
                    'method' => 'post',
                ],]],
            ['link', '<i class="fa fa-pencil" aria-hidden="true"></i>', ['update', 'id' => $model->id], ['data-toggle' => 'tooltip', 'data-original-title' => 'редактировать']],
        ]
    ]);
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'status',
            'full_name',
            'phone',
            'support_type',
            'comment:ntext',
            'capacity',
            'options:ntext',
            'created_at',
        ],
    ]) ?>
    <?php BoxWidget::end(); ?></div>
