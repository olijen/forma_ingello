<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\transit\records\Transit */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Transits', 'url' => ['index']];

?>
<div class="transit-view">

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
                'attribute' => 'from_warehouse_id',
                'value' => $model->getFromWarehouseName(),
                'tabel' => 'От склада',
            ],
            [
                'attribute' => 'to_warehouse_id',
                'value' => $model->getToWarehouseName(),
                'tabel' => 'К складу',
            ],
            'name',
            [
                'attribute' => 'date_create',
                'format' => ['date', 'dd.MM.yyyy'],
            ],
            [
                'attribute' => 'date_complete',
                'format' => ['date', 'dd.MM.yyyy'],
            ],
        ],
    ]) ?>

    <h2>Товары</h2>

    <p>
        <?= Html::a('Добавить товар', ['/transit/transit-product/create', 'transit_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $transitProductsDataProvider,
        'filterModel' => $transitProductsSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'product_category_name',
                'value' => 'product.category.name',
                'label' => 'Категория',
            ],
            [
                'attribute' => 'product_manufacturer_name',
                'value' => 'product.manufacturer.name',
                'label' => 'Производитель',
            ],
            [
                'attribute' => 'product_name',
                'value' => 'product.name',
                'label' => 'Товар',
            ],
            'quantity',
            'new_price',

            [
                'class' => '\yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'urlCreator' => function($action, $model, $key, $index)
                {
                    return \yii\helpers\Url::toRoute(["/transit/transit-product/$action", 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>

</div>
