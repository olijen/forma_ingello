<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\event\records\Event */
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

    <div class="event-form">
        <?php \yii\widgets\Pjax::begin(['id' => 'create-event']); ?>
        <?php $form = ActiveForm::begin([
            'options' => [
                'data-pjax' => 1
            ]
        ]); ?>
        <?= $form->field($model, 'event_type_id', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

        <?= $form->field($model, 'name', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

        <?= $form->field($model, 'text', ['options' => ['class' => 'col-xs-12']])->widget(\vova07\imperavi\Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'pastePlainText' => true,
                'imageUpload' => \yii\helpers\Url::to(['/main/image/save-redactor-img', 'id' => null, 'sub' => 'event']),
                'replaceDivs' => false,
                'plugins' => [
                    'fullscreen',
                    'table'
                ]
            ]
        ])
        ?>

        <?= $form->field($model, 'status', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

        <?= $form->field($model, 'date_from', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

        <?= $form->field($model, 'date_to', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

        <?= $form->field($model, 'start_time', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <?php \yii\widgets\Pjax::end(); ?>
    </div>

