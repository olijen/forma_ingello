<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\patient\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nameCompany') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'years') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'patronymic') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'dateBirth') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'diagnosis') ?>

    <?php // echo $form->field($model, 'complaints') ?>

    <?php // echo $form->field($model, 'allDiseases') ?>

    <?php // echo $form->field($model, 'developmentOfDisease') ?>

    <?php // echo $form->field($model, 'surveyData') ?>

    <?php // echo $form->field($model, 'bite') ?>

    <?php // echo $form->field($model, 'mouthCondition') ?>

    <?php // echo $form->field($model, 'x-ray') ?>

    <?php // echo $form->field($model, 'laboratoryTests') ?>

    <?php // echo $form->field($model, 'colorVita') ?>

    <?php // echo $form->field($model, 'hygieneЕrainingDate') ?>

    <?php // echo $form->field($model, 'dateHygieneControl') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
