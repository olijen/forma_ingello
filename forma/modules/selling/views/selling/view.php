<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\Selling */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sellings', 'url' => ['index']];
?>
<div class="selling-view">

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
                'attribute' => 'customer_id',
                'value' => $model->customer->name,
                'label' => 'Клиент',
            ],
            [
                'attribute' => 'warehouse_id',
                'value' => $model->warehouse->name,
                'label' => 'Склад',
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
            [
                'attribute' => 'state',
                'value' => $model->getStateName(),
            ],
        ],
    ]) ?>

    <h2>Товары</h2>

    <p>
        <?= Html::a('Добавить товар', ['/selling/selling-product/create', 'selling_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $sellingProductsDataProvider,
        'filterModel' => $sellingProductsSearchModel,
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
            'cost',
            [
                'attribute' => 'pack_unit_id',
                'value' => 'packUnit.name',
                'filter' => \forma\modules\product\records\PackUnit::getList(),
            ],

            [
                'class' => '\yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'urlCreator' => function($action, $model, $key, $index)
                {
                    return \yii\helpers\Url::toRoute(["/selling/selling-product/$action", 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>
    
    <?php \yii\widgets\Pjax::end(); ?>

</div>
