<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\state\StateToState */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="state-to-state-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
