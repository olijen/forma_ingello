<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\transit\records\TransitProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transit-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \forma\modules\product\records\Product::getList(),
        ['prompt' => '']
    )->label('Товар') ?>

    <?php if (Yii::$app->controller->action->id == 'create') : ?>

        <?= $form->field($model, 'transit_id')->hiddenInput(['value' => $transitId])->label('') ?>

    <?php else : ?>

        <?= $form->field($model, 'transit_id')->dropDownList(
            \forma\modules\transit\records\Transit::getList(),
            ['prompt' => '']
        )->label('Транзит') ?>

    <?php endif ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
