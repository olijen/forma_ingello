<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
use forma\modules\inventorization\services\InventorizationService;
use kartik\daterange\DateRangePicker;
use forma\modules\warehouse\records\Warehouse;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use forma\modules\inventorization\records\Inventorization;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\inventorization\records\InventorizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Инвентаризация';

?>
<div class="inventorization-index">

    <p>
        <?php

        $items = [];
        foreach (Warehouse::getList() as $id => $name) {
            $items[] = ['label' => $name, 'url' => Url::to(['/inventorization/form/create', 'warehouseId' => $id])];
        }

        echo ButtonDropdown::widget([
            'label' => 'Cоздать инвентаризацию',
            'containerOptions' => ['class' =>'btn-all-screen'],
            'dropdown' => [
                'items' => $items,
                'options' => ['class' => 'btn-all-screen']
            ],
            'options' => ['class' => 'btn btn-success forma_light_orange btn-all-screen'],
        ]);

        ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'warehouse_id',
                'value' => 'warehouseName',
                'filter' => Warehouse::getList(),
                'label' => 'Склад',
            ],
            'name',
            [
                'attribute' => 'date',
                'filter' => DateRangePicker::widget([
                    'name' => 'date_range',
                    'presetDropdown' => true,
                    'pluginOptions'=>[
                        'locale' => [
                            'format' => 'DD.MM.Y'
                        ],
                    ],
                    //todo: абстрагировать
                    'value' => isset($_GET['date_range']) ?
                        $_GET['date_range'] : InventorizationService::getDateRange(),
                ]),
                'format' => ['date', 'php:d.m.Y H:i:s'],
                'label' => 'Дата проведения',
            ],
            [
                'attribute' => 'state',
                'filter' => Inventorization::getStatesList(),
                'label' => 'Состояние',
                'value' => function(Inventorization $obj) {
                    return $obj->getState()->getName();
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
