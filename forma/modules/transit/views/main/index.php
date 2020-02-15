<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use forma\modules\transit\records\transit\Transit;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\transit\records\transit\TransitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Перемещение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <a href="/transit/form/index" class="btn btn-success">Новое перемещение</a>
    <hr />
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
                'filter' => \forma\modules\warehouse\records\Warehouse::getList(false),
                'label' => 'К складу',
            ],
            'name',
            [
                'attribute' => 'date_create',
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'name' => 'date_create_range',
                    'presetDropdown' => true,
                    'pluginOptions'=>[
                        'locale' => [
                            'format' => 'DD.MM.Y'
                        ],
                    ],
                    //todo: абстрагировать
                    'value' => isset($_GET['date_create_range']) ?
                        $_GET['date_create_range'] : Transit::getDateCreateRange(),
                ]),
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            [
                'attribute' => 'date_complete',
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'name' => 'date_complete_range',
                    'presetDropdown' => true,
                    'pluginOptions'=>[
                        'locale' => [
                            'format' => 'DD.MM.Y'
                        ],
                    ],
                    //todo: абстрагировать
                    'value' => isset($_GET['date_complete_range']) ?
                        $_GET['date_complete_range'] : Transit::getDateCompleteRange(),
                ]),
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            [
                'attribute' => 'state',
                'value' => function(Transit $obj) {
                    return $obj->getState()->getName();
                },
                'label' => 'Состояние',
                'filter' => $searchModel->getStatesList(),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
