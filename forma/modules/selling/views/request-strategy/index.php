<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\requeststrategy\RequestStrategySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Вопрос к стратегии');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-strategy-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Создать вопрос к стратегии'), ['create'], ['class' => 'btn btn-success']) ?>
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
