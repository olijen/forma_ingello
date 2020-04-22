<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\transit\records\TransitProduct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transit Products', 'url' => ['index']];

?>
<div class="transit-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'product_id',
                'value' => $model->getProductName(),
                'label' => 'Товар',
            ],
            [
                'attribute' => 'transit_id',
                'value' => $model->getTransitName(),
                'label' => 'Транзит',
            ],
            'quantity',
            'new_price',
        ],
    ]) ?>

</div>
