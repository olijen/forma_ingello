<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\transit\records\TransitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'from_warehouse_id')->dropDownList(
        \forma\modules\transit\records\Transit::getList(),
        ['prompt' => '']
    )->label('От склада') ?>

    <?= $form->field($model, 'to_warehouse_id')->dropDownList(
        \forma\modules\transit\records\Transit::getList(),
        ['prompt' => '']
    )->label('К складу') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_complete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
