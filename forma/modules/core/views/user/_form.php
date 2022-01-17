<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php if (!$model->isNewRecord) { ?>
        <?= $form->field($model->userProfile, 'imageFile', ['options' => ['class' => 'col-xs-12']])->widget(\kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'initialPreview' => \yii\helpers\Url::to(["/img/user-profile/{$model->userProfile->image}"]),
                'initialPreviewAsData' => true,
            ],
        ]); ?>
    <?php } else { ?>
        <?= $form->field($model->userProfile, 'imageFile', ['options' => ['class' => 'col-xs-12']])->widget(\kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]); ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
