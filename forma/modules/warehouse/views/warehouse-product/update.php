<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\WarehouseProduct */

$this->title = 'Изменить объект хранилища: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Хранилища', 'url' => '/warehouse/warehouse'];
$this->params['breadcrumbs'][] = [
    'label' => $model->warehouse->name,
    'url' => Url::to(['/warehouse/warehouse/view', 'id' => $model->warehouse_id]),
];

$this->params['breadcrumbs'][] = $model->product->name;
?>
<div class="warehouse-product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
