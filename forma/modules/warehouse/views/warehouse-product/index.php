<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\warehouse\records\WarehouseProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Products';

?>
<div class="warehouse-product-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Warehouse Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_id',
                'value' => 'productName',
                'filter' => \forma\modules\product\records\Product::getList(),
                'label' => 'Товар',
            ],
            [
                'attribute' => 'warehouse_id',
                'value' => 'warehouseName',
                'filter' => \forma\modules\warehouse\records\Warehouse::getList(),
                'label' => 'Склад',
            ],
            'quantity',
            'purchase_cost',
            'consumer_cost',
            'recommended_cost',
            'tax',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
