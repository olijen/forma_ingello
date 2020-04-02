<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\SellingProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Selling Products';
?>
<div class="selling-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Selling Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_id',
                'value' => 'product.name',
                'filter' => \forma\modules\product\records\Product::getList(),
            ],
            [
                'attribute' => 'pack_unit_id',
                'value' => 'packUnit.name',
                'filter' => \forma\modules\product\records\PackUnit::getList(),
            ],
            [
                'attribute' => 'selling_id',
                'value' => 'selling.name',
                'filter' => \forma\modules\selling\records\Selling::getList(),
            ],
            'quantity',
            'cost',
            'cost_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
