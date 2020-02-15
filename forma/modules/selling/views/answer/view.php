<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Answer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ответы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-view">


    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить объект?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            [
                'attribute' => 'request_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->requestText;
                }
            ],
        ],
    ]) ?>

</div>
