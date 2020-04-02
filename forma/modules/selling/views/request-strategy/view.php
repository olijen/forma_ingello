<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\requeststrategy\RequestStrategy */

$this->title = $model->request_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопрос к стратегии'), 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="request-strategy-view">


    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'request_id' => $model->request_id, 'strategy_id' => $model->strategy_id], [
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
            [
                'attribute' => 'request_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->requestText;
                }
            ],
            [
                'attribute' => 'strategy_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->strategyName;
                }
            ],
        ],
    ]) ?>

</div>
