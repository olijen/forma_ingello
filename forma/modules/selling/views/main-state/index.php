<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\state\StateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Состояния');


?>
<div class="state-index col ">

    <p>
        Создайте состояния воронки продаж, в которых может быть продажа, например: Знакомство, Презентация, Подписание, Оплата
    </p>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать состояние'), ['create'], ['class' => 'btn btn-success forma_blue']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {update} {delete} ',
            ],

            'name',
            'order',
        ],
    ]); ?>


</div>
