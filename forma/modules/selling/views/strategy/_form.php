<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\strategy\Strategy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="strategy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
    if (isset($_GET['isSelling'])) {
        $model->is_selling = $_GET['isSelling'];
    }
    ?>

    <?= $form->field($model, 'is_selling')->widget(\kartik\select2\Select2::classname(), [
        'data' => ['0' => 'Для найма', '1' => 'Для продаж'],
        'value' => $model->is_selling ?? null,
        'pluginOptions' => ['allowClear' => true],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
