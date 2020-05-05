<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model forma\modules\vacancy\records\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php
    $formOptions = [
        'id' => 'vacancy-form',
    ];
    if (Yii::$app->request->isAjax) {
        $formOptions['options'] = [
            'class' => 'select-modal-form',
            'data-select' => '#interview-vacancy_id',
        ];
    }
    ?>
    <script>
        $.each($('.block'), function (id, value) {
            $(value)
                .removeClass()
                .addClass('col-md-12');
         });
    </script>
    <?php
    $form = ActiveForm::begin($formOptions);
    ?>
    <div class="row">
        <div class="col-md-5 block">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rate')->textInput() ?>

        </div>
        <div class="col-md-7 block">
            <?= $form->field($model, 'description')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'imagemanager',
                        'filemanager',
                    ],
                    'clips' => [
                        ['Lorem ipsum...', 'Lorem...'],
                        ['red', '<span class="label-red">red</span>'],
                        ['green', '<span class="label-green">green</span>'],
                        ['blue', '<span class="label-blue">blue</span>'],
                    ],
                    'imageUpload' => \yii\helpers\Url::to(['/worker/worker/image-upload']),
                    'imageManagerJson' => \yii\helpers\Url::to(['/worker/worker/images-get']),
                    'fileManagerJson' => \yii\helpers\Url::to(['/worker/worker/files-get']),
                    'fileUpload' => \yii\helpers\Url::to(['/worker/worker/file-upload'])
                ],
            ]); ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
