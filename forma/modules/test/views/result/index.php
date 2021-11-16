<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\test\records\TestResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты тестов';
?>
<div class="test-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['attribute'=>'result',
                'label'=>'Ответы к тесту',
                'value' => function($model){return strip_tags($model->result);}
            ],

            ['attribute'=>'testType.name',
                'label'=>'Тест'],

            ['attribute'=>'customer.name',
                'label'=>'Клиент'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',

            ]

        ],
    ]); ?>
    
        <div class="btn btn-lg ">
            <a href="/test/main">Вернуться к списку</a>
        </div>
</div>
