<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\test\records\TestResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты тестов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            ['attribute'=>'result',
                'label'=>'Ответы к тесту',
                'value' => function($model){return strip_tags($model->result);}
            ],

            ['attribute'=>'test_type_id',
                'label'=>'Номер теста'],

            ['attribute'=>'customer_id',
                'label'=>'ID Пользователя'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
