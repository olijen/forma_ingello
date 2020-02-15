<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\WarehouseProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \forma\modules\product\records\Product::getList(),
        ['prompt' => '']
    )->label('Товар') ?>

    <?= $form->field($model, 'warehouse_id')->dropDownList(
        \forma\modules\warehouse\records\Warehouse::getList(),
        ['prompt' => '']
    )->label('Склад') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'purchase_cost')->textInput() ?>

    <?= $form->field($model, 'consumer_cost')->textInput() ?>

    <?= $form->field($model, 'recommended_cost')->textInput() ?>

    <?= $form->field($model, 'tax')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
