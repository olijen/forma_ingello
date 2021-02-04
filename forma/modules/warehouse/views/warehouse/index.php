<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\warehouse\records\WarehouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все хранилища';


?>

<div class="warehouse-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Создать хранилище', ['create'], ['class' => 'btn btn-success forma_light_orange']) ?>
        <?= Html::a('<i class="fa fa-th"></i> Все объекты', ['all-remains'], ['class' => 'btn btn-success forma_light_orange']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list',
        'options' => ['class' => 'row'],
        'layout' => "{items}",
        'itemOptions' => ['class' => 'col-md-4']
    ]);?>

<?php /* ?>

<?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
            [
                'attribute' => 'country_id',
                'value' => 'country.name',
                'filter' => \forma\modules\country\records\Country::getList(),
            ],
            'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?></div>

<?php */ ?>
