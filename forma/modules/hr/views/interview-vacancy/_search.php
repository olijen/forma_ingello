<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\SellingProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="selling-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \forma\modules\product\records\Product::getList(),
        ['prompt' => '']
    )->label('Товар') ?>

    <?= $form->field($model, 'selling_id')->dropDownList(
        \forma\modules\hr\records\interview\Interview::getList(),
        ['prompt' => '']
    )->label('Найм') ?>

    <?= $form->field($model, 'quantity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
