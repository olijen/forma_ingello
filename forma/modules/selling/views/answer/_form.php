<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'request_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\selling\records\talk\Request::find()->all(), 'id', 'text')) ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-selling' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
