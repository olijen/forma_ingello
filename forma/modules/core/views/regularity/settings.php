<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\state\StateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */




$this->title = Yii::t('app', 'Настройки');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="selling-index">
    <div class="col-md-6 block">
    <p>
        <?= Html::a(Yii::t('app', 'Создать регламент'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Вернуться к регламентам'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'order',
            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {update} {delete} ',
            ],
        ],
    ]); ?>

    </div>
</div>
