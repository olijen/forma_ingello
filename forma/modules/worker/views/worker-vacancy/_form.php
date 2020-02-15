<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\worker\records\workervacancy\WorkerVacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worker-vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'worker_id')->textInput() ?>

    <?= $form->field($model, 'vacancy_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
