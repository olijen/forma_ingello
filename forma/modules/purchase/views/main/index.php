<?php
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\supplier\records\Supplier;
use forma\modules\warehouse\records\Warehouse;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var $dataProvider
 * @var $searchModel
 */

$this->title = 'Поставки';


?>
<a href="/purchase/form/index" class="btn btn-success forma_light_orange btn-all-screen"><i class="fa fa-plus"></i> Заказать поставку</a>

<hr />

<?php Pjax::begin(); ?> <?= GridView::widget([
    'id' => 'purchases-grid',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'attribute' => 'supplier_id',
            'value' => 'supplier.name',
            'filter' => Supplier::getList(),
            'label' => 'Поставщик',
        ],
        [
            'attribute' => 'warehouse_id',
            'value' => 'warehouse.name',
            'label' => 'Склад',
            'filter' => Warehouse::getList(),
        ],
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
                    $_GET['date_create_range'] : Purchase::getDateCreateRange(),
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
                    $_GET['date_complete_range'] : Purchase::getDateCompleteRange(),
            ]),
            'format' => ['date', 'php:d.m.Y H:i:s'],
        ],
        [
            'attribute' => 'state',
            'value' => function(Purchase $obj) {
                return $obj->getState()->getName();
            },
            'label' => 'Состояние',
            'filter' => $searchModel->getStatesList(),
        ],
        [
            'label' => '<span>Предоплата</span>',
            'encodeLabel' => false,
            'value' => function(Purchase $obj) {
                $prepayment = $obj->getPrepaymentPercent();
                return $prepayment ? $prepayment . '%' : null;
            },
        ],

        ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}'],
    ],
]); ?> <?php Pjax::end(); ?>
