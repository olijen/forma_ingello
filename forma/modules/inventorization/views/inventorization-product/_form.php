<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\inventorization\records\InventorizationProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventorization-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \forma\modules\product\records\Product::getList(),
        ['prompt' => '']
    )->label('Товар') ?>

    <?php if (Yii::$app->controller->action->id == 'create') : ?>

        <?= $form->field($model, 'inventorization_id')->hiddenInput(['value' => $inventorizationId])->label('') ?>

    <?php else : ?>

        <?= $form->field($model, 'inventorization_id')->dropDownList(
            \forma\modules\inventorization\records\Inventorization::getList(),
            ['prompt' => '']
        )->label('Инвентаризация') ?>

    <?php endif ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
