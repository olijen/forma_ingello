<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\SellingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="selling-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'worker_id')->dropDownList(
        \forma\modules\worker\records\Worker::getList(),
        ['prompt' => '']
    )->label('Клиент') ?>

    <?= $form->field($model, 'warehouse_id')->dropDownList(
        \forma\modules\project\records\project\Project::getList(),
        ['prompt' => '']
    )->label('Склад') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_complete') ?>

    <?= $form->field($model, 'state')->dropDownList($model::getStatesList(), ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
