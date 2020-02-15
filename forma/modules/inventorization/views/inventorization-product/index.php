<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\inventorization\records\InventorizationProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventorization Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorization-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inventorization Product', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'inventorization_id',
                'value' => 'inventorizationName',
                'filter' => \forma\modules\inventorization\records\Inventorization::getList(),
                'label' => 'Инвентаризация',
            ],
            'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
