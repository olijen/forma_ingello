<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\modules\product\records\Product;
use forma\modules\warehouse\records\WarehouseProduct;

/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\WarehouseProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $productsList = /* isset($warehouse) ? WarehouseProduct::getAvailableForAddingList($warehouse->id) :
        */ Product::getList() ?>

    <?= $form->field($model, 'product_id')->widget(kartik\select2\Select2::className(), [
        'data' => $productsList,
        'options' => ['placeholder' => 'Выберите продукт ...'],
    ])->label('Товар') ?>

    <?php if (Yii::$app->controller->action->id == 'create') : ?>

        <?= $form->field($model, 'warehouse_id')->hiddenInput(['value' => $warehouse->id])->label(false) ?>

    <?php else : ?>

        <?= $form->field($model, 'warehouse_id')->hiddenInput()->label(false) ?>

    <?php endif ?>
    
    <?= $form->field($model, 'quantity')->textInput() ?>

    <?php $currList = /* isset($warehouse) ? WarehouseProduct::getAvailableForAddingList($warehouse->id) :
        */ \forma\modules\product\records\Currency::getList() ?>

    <?= $form->field($model, 'currency_id')->widget(kartik\select2\Select2::className(), [
        'data' => $currList,
        'options' => ['placeholder' => 'Выберите валюту ...'],
    ])->label('Валюта') ?>

    <?= $form->field($model, 'purchase_cost')->textInput() ?>

    <?= $form->field($model, 'trade_cost')->textInput() ?>

    <?= $form->field($model, 'consumer_cost')->textInput() ?>

    <?= $form->field($model, 'recommended_cost')->textInput() ?>

    <?= $form->field($model, 'tax')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
