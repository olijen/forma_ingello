<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\patient\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nameCompany')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'years')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'dateBirth')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnosis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complaints')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'allDiseases')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'developmentOfDisease')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'surveyData')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bite')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mouthCondition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'xray')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'laboratoryTests')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'colorVita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hygieneЕrainingDate')->textInput() ?>

    <?= $form->field($model, 'dateHygieneControl')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
