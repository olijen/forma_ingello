<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\Selling */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="selling-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'worker_id')->dropDownList(
        \forma\modules\worker\records\Worker::getList(),
        ['prompt' => '']
    )->label('Клиент') ?>

    <?= $form->field($model, 'warehouse_id')->dropDownList(
        \forma\modules\project\records\project\Project::getList(),
        ['prompt' => '']
    )->label('Склад') ?>

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

    <?= $form->field($model, 'state')->dropDownList($model::getStatesList(), ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
