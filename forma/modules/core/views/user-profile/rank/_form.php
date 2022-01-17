<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rank */
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

<div class="rank-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <?= $form->field($model, 'name', ['options' => ['class' => 'col-xs-12']])->textInput() ?>
    <?php if (!$model->isNewRecord) { ?>
        <?= $form->field($model, 'imageFile', ['options' => ['class' => 'col-xs-12']])->widget(\kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'initialPreview' => \yii\helpers\Url::to(["/img/user-profile/$model->image"]),
                'initialPreviewAsData' => true,
            ],
        ]); ?>
    <?php } else { ?>
        <?= $form->field($model, 'imageFile', ['options' => ['class' => 'col-xs-12']])->widget(\kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]); ?>
    <?php } ?>
    <?= $form->field($model, 'order', ['options' => ['class' => 'col-xs-12']])->textInput() ?>


    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
