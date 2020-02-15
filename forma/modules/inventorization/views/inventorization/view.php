<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\inventorization\records\Inventorization */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Инвентаризация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorization-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
                'attribute' => 'warehouse_id',
                'value' => $model->warehouse->name,
                'label' => 'Склад',
            ],
            'name',
            [
                'attribute' => 'date',
                'format' => ['date', 'dd.MM.yyyy'],
            ],
        ],
    ]) ?>

    <h2>Товары</h2>

    <p>
        <?= Html::a('Добавить товар', ['/inventorization/inventorization-product/create', 'inventorization_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $inventorizationProductsDataProvider,
        'filterModel' => $inventorizationProductsSearchModel,
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
                'label' => 'Название',
            ],
            'quantity',

            [
                'class' => '\yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'urlCreator' => function($action, $model, $key, $index)
                {
                    return \yii\helpers\Url::toRoute(["/inventorization/inventorization-product/$action", 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>

</div>
