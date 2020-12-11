<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestTypeField */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="test-type-field-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
<div class="col-xs-4">
    <?= $form->field($model, 'block_name')->textInput(['maxlength' => true])->label($label = 'Название блока') ?>
</div>
        <div class="col-xs-4">
    <?= $form->field($model, 'label_name')->textInput(['maxlength' => true])->label($label = 'Вопрос') ?>
        </div>
        <div class="col-xs-4">
    <?= $form->field($model, 'type')->dropDownList([
        'radio' => 'radio',
        'text' => 'text',
        'checkbox' => 'checkbox'])
        ->label($label = 'Тип поля') ?>

    </div>
    </div>
<div class="row">
    <div class="col-xs-4">
    <?= $form->field($model, 'value')->textInput(['maxlength' => true])->label($label = 'Изначальное значение') ?>
    </div>
        <div class="col-xs-4">
    <?= $form->field($model, 'placeholder')->textInput(['maxlength' => true])->label($label = 'Подсказка') ?>
        </div>
            <div class="col-xs-6">
    <?= $form->field($model, 'required')->checkbox()->label($label = 'Будет ли обязательным?') ?>
            </div>
    <?php if (isset($model['test_id'])): ?>
    <?= $form->field($model, 'test_id')->textInput(['value'=>$model['test_id']])->label($label = 'ID Вашего теста') ?>
    <?php else: ?>
    <?= $form->field($model, 'test_id')->hiddenInput(['value'=>$_GET['id']])->label($label = '') ?>
    <?php endif; ?>
</div>
    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i>'. ' '.'Сохранить', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
