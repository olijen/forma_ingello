<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\projectvacancy\ProjectVacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-3 form-group">

    <?= $form->field($model, 'project_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\project\records\project\Project::getList(true), 'id', 'name' ),  ['value' => $model->isNewRecord ? $id : null ] ) ?>
    </div>
    <div class="col-md-3 form-group">
    <?= $form->field($model, 'vacancy_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\vacancy\records\Vacancy::getList(true), 'id', 'name' )) ?>
    </div>
    <div class="col-md-2 form-group">
    <?= $form->field($model, 'count')->textInput(['type' => 'number']) ?>
    </div>
    <div class="col-md-12 form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        <?= $model->isNewRecord ? '' : Html::a('Начать найм ', \yii\helpers\Url::to(['/hr/form/index', 'project_id' => $model->project_id, 'vacancy_id' => $model->vacancy_id]), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
