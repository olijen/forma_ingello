<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\test\records\TestResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты теста';; ?>
<div class="test-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'test_id',
                'label' => 'Id',
                'value' => 'test_id','contentOptions' => ['style' => 'width:10%;  min-width:7%;  ']
            ],

            ['attribute' => 'label_name',
                'label' => 'Текст теста',
            ],

            ['attribute' => 'value',
                'label' => 'Ответы'],

        ],
    ]); ?>

    <div class="btn btn-lg ">
        <a href="/test/main">Вернуться к списку</a>
    </div>
</div>