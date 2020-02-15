<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\transit\records\Transit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_warehouse_id')->dropDownList(
        \forma\modules\warehouse\records\Warehouse::getList(),
        ['prompt' => '']
    )->label('От склада') ?>

    <?= $form->field($model, 'to_warehouse_id')->dropDownList(
        \forma\modules\warehouse\records\Warehouse::getList(),
        ['prompt' => '']
    )->label('К складу') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_create')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'dd.MM.yyyy',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <?= $form->field($model, 'date_complete')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'dd.MM.yyyy',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
