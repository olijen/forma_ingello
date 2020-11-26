<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\test\records\TestTypeField */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-type-field-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'block_name')->textInput(['maxlength' => true])->label($label = 'Название блока') ?>

    <?= $form->field($model, 'label_name')->textInput(['maxlength' => true])->label($label = 'Вопрос') ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true])->label($label = 'Тип поля') ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true])->label($label = 'Изначальное значение') ?>

    <?= $form->field($model, 'placeholder')->textInput(['maxlength' => true])->label($label = 'Подсказка') ?>

    <?= $form->field($model, 'required')->checkbox()->label($label = 'Будет ли обязательным?') ?>
    <?php if (!empty($_GET)): ?>
    <?= $form->field($model, 'test_id')->textInput(['value'=>$_GET['id']])->label($label = 'ID Вашего теста') ?>
    <?php else: ?>
    <?= $form->field($model, 'test_id')->textInput(['placeholder'=>'Введите id теста'])->label($label = 'ID Вашего теста') ?>
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
