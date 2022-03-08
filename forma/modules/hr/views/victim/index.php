<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Victims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="victim-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Victim', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fullname:ntext',
            'birthday',
            'is_child',
            'place_of_residence:ntext',
            //'second_residence:ntext',
            //'name_where_to_settle:ntext',
            //'settlement_address:ntext',
            //'phone:ntext',
            //'registered_at',
            //'stay_for:ntext',
            //'questions:ntext',
            //'specialization:ntext',
            //'destination:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
