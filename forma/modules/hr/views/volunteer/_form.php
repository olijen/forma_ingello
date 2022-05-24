<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\volunteer\Volunteer */
/* @var $form yii\widgets\ActiveForm */

if ($model->hasErrors()):
    \wokster\ltewidgets\BoxWidget::begin([
        'solid' => true,
        'color' => 'danger',
        'title' => 'Ошибки валидации',
        'close' => true,
    ]);
    $error_data = $model->firstErrors;
    echo \yii\widgets\DetailView::widget([
        'model' => $error_data,
        'attributes' => array_keys($error_data)
    ]);
    \wokster\ltewidgets\BoxWidget::end();
endif;

?>

<div class="volunteer-form">

    <?php $form = ActiveForm::begin([
    ]); ?>

    <?= $form->field($model, 'status', ['options' => ['class' => 'col-md-6 col-xs-12']])->widget(\kartik\select2\Select2::classname(), [
        'data' => $model->getStatuses(),
        'options' => ['placeholder' => 'Выбор актуальности...'],
        'pluginOptions' => ['allowClear' => true],
    ]) ?>

    <?= $form->field($model, 'full_name', ['options' => ['class' => 'col-md-6 col-xs-12']])->textInput() ?>

    <?= $form->field($model, 'phone', ['options' => ['class' => 'col-md-6 col-xs-12']])->textInput() ?>

    <?= $form->field($model, 'support_type', ['options' => ['class' => 'col-md-6 col-xs-12']])->widget(\kartik\select2\Select2::classname(), [
        'data' => $model->getSupportTypes(),
        'options' => ['placeholder' => 'Выбор помощи...'],
        'pluginOptions' => ['allowClear' => true],
    ]) ?>

    <?= $form->field($model, 'comment', ['options' => ['class' => 'col-md-6 col-xs-12']])->widget(\vova07\imperavi\Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200, 'maxHeight' => 220]]); ?>

    <?= $form->field($model, 'capacity', ['options' => ['class' => 'col-md-6 col-xs-12']])->widget(\kartik\range\RangeInput::classname(), [
        'options' => ['placeholder' => 'Вместимость (1 - 25)...'],
        'html5Container' => ['style' => 'width:250px'],
        'html5Options' => ['min' => 1, 'max' => 25],
        'addon' => ['append' => ['content' => '<i class="fas fa-warehouse"></i>']]
    ]); ?>

    <?php
    $optionsArray = null;
    if (!$model->isNewRecord) {
        $explodeOptions = explode(',', $model->options);
        foreach ($explodeOptions as $explodeOption) {
            foreach ($model->getOptions() as $key => $option) {
                if ($explodeOption == $option) {
                    $optionsArray[] = $key;
                }
            }
        }
    }
    ?>

    <?= $form->field($model, 'options', ['options' => ['class' => 'col-md-6 col-xs-12']])->widget(\kartik\select2\Select2::className(), [
        'data' => $model->getOptions(),
        'options' => [
            'multiple' => true,
            'value' => $optionsArray
        ],
        'pluginOptions' => [
            'tags' => true,
        ],
    ]); ?>

    <div class="col-xs-12 col-md-12">
        <div class="form-group" style="text-align: center;">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success btn-all-screen half-screen' : 'btn btn-primary btn-all-screen half-screen']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
