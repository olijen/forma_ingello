<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\transit\records\TransitProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transit Products';

?>
<div class="transit-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transit Product', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'transit_id',
                'value' => 'transitName',
                'filter' => \forma\modules\transit\records\Transit::getList(),
                'label' => 'Транзит',
            ],
            'quantity',
            'new_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
