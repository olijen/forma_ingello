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
        <?= Html::a('Создать хранилище', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Все объекты', ['all-remains'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list',

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
