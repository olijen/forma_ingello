<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\state\StateSearchState */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'State To States');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-to-state-index">


    <p>
        <?= Html::a(Yii::t('app', 'Create State To State'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'state_id',
            'to_state_id',
            'toState.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
