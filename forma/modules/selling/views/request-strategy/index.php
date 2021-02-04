<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\requeststrategy\RequestStrategySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Вопрос к стратегии');

?>
<div class="request-strategy-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать вопрос к стратегии'), ['create'], ['class' => 'btn btn-success forma_blue']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
