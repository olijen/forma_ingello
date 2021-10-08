<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model forma\modules\worker\records\Worker */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="worker-form" >

    <?php
    $formOptions = [
        'id' => 'worker-form',
    ];
    if (Yii::$app->request->isAjax) {
        $formOptions['options'] = [
            'class' => 'select-modal-form',
            'data-select' => '#interview-worker_id',
        ];
        ?>
        <script>
            $.each($('.block'), function (id, value) {
                $(value)
                    .removeClass()
                    .addClass('col-md-12');
            });
            $('#parent')
                .removeClass()
                .addClass('col-md-12');
        </script>
    <?php
    }
    $form = ActiveForm::begin($formOptions);
    ?>
    <div class="row">
        <div class="col-md-5" id="parent">
            <div class="col-md-12 block ">
                <?= $form->field($model, 'status')->textInput()->dropDownList(['0' => 'Свободен', '1' =>'В работе'])->label('Статус занятости') ?>
            </div>
            <div class="col-md-4 block">
                 <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4 block">
                <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4 block">
                <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 block">
                <?= $form->field($model, 'date_birth')->textInput(['type' => 'date']) ?>
            </div>
            <div class="col-md-6 block">
                <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-12 block">
                <?= $form->field($model, 'apply_position')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 block">
                <?= $form->field($model, 'gender')->textInput()->radioList(['0' => 'Мужской', '1' => 'Женский']) ?>
            </div>

            <div class="col-md-6 block">
                <?= $form->field($model, 'experience')->textInput(['type' => 'number']) ?>
            </div>
            <div class="col-md-6 block">
                <?= $form->field($model, 'collaborated')->textInput()->checkbox() ?>
            </div>

        </div>
        <div class="col-md-7 block">
        <?= $form->field($model, 'experience_description')->widget(Widget::className(), [
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

            <div class="col-xs-12 no-margin no-padding text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Кандидат подходит для вакансий"</div>
                    <div class="panel-body">
                        <?= $form->field($model, 'workerVacanciesList')->widget(Select2::className(), [
                            'data' =>  \forma\modules\worker\records\workervacancy\WorkerVacancy::getListVacancies(),
                            'options' => [
                                'placeholder' => 'Выберете вакансии...',
                                'multiple' => true,
                            ],
                            'pluginOptions' => [
                                'tags' => true,
                            ],
                        ])->label(false) ?>

                    </div>
                </div>
            </div>
    </div>
        <div class="form-group text-center">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>


    <?php ActiveForm::end(); ?>

</div>
