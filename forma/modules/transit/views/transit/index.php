<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\transit\records\TransitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transits';

?>
<div class="transit-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'from_warehouse_id',
                'value' => 'fromWarehouseName',
                'filter' => \forma\modules\warehouse\records\Warehouse::getList(),
                'label' => 'От склада',
            ],
            [
                'attribute' => 'to_warehouse_id',
                'value' => 'toWarehouseName',
                'filter' => \forma\modules\warehouse\records\Warehouse::getList(),
                'label' => 'К складу',
            ],
            'name',
            [
                'attribute' => 'date_create',
                /*
                'format' => ['date', 'dd.MM.yyyy'],
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date_create',
                    'startAttribute' => 'date_create_from',
                    'endAttribute' => 'date_create_to',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd.m.Y',
                        ],
                        'opens' => 'left',
                    ],
                ]),
                */
            ],
            [
                'attribute' => 'date_complete',
                /*
                'format' => ['date', 'dd.MM.yyyy'],
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'model' => $searchModel,
                    'convertFormat' => true,
                    'attribute' => 'date_complete',
                    'startAttribute' => 'date_complete_from',
                    'endAttribute' => 'date_complete_to',
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd.m.Y',
                        ],
                        'opens' => 'left',
                    ],
                ]),
                */
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
