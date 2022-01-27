<?php

use forma\modules\selling\records\strategy\Strategy;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\strategy\StrategySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Стратегии');
?>
<div class="strategy-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать стратегию'), ['create'], ['class' => 'btn btn-success forma_blue']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:10%;  min-width:10%;  ']],
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'description:ntext',
              ['attribute' => 'is_selling',
                'label' => 'Тип',
                'value' => function($searchModel){
                    if($searchModel->is_selling=='')return"Для найма";else if($searchModel->is_selling=='1')
                        return"Для продаж";
                },
                  'filter' => Html::activeDropDownList($searchModel, 'is_selling',
                      [''=>'',''=>'Для найма', '1'=>'Для продаж'],
                      ['placeholder' => 'Выбрать тип...','class' => 'form-control']),
                ],


        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
