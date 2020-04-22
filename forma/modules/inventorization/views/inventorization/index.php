<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
use forma\modules\inventorization\services\InventorizationService;
use kartik\daterange\DateRangePicker;
use forma\modules\warehouse\records\Warehouse;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;

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
            $items[] = ['label' => $name, 'url' => Url::to(['/', 'warehouseId' => $id])];
        }

        echo ButtonDropdown::widget([
            'label' => 'Создать инвентаризацию',
            'dropdown' => [
                'items' => $items,
            ],
            'options' => ['class' => 'btn btn-success'],
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
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
