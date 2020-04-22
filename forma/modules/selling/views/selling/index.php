<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\SellingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';

?>
<div class="selling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Начать работу с клиентом', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>

    <?= DynaGrid::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'customer_id',
                'value' => 'customerName',
                'filter' => \forma\modules\customer\records\Customer::getList(),
                'label' => 'Клиент',
            ],
            [
                'attribute' => 'warehouse_id',
                'value' => 'warehouseName',
                'filter' => \forma\modules\warehouse\records\Warehouse::getList(),
                'label' => 'Склад',
            ],
            'name',
            [
                'attribute' => 'date_create',
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
            ],
            [
                'attribute' => 'date_complete',
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
            ],
            [
                'attribute' => 'state',
                'value' => 'stateName',
                'filter' => \forma\modules\selling\records\Selling::getStatesList(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?>

</div>
