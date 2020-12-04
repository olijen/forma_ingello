<?php

use forma\modules\core\services\RegularityAndItemPictureService;
use kartik\color\ColorInput;
use kartik\file\FileInput;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Item */
/* @var $form yii\widgets\ActiveForm */

$picture = RegularityAndItemPictureService::getPictureUrl($model);
?>
<div class="row">

    <div class="col-md-5">


        <?php $form = ActiveForm::begin(); ?>
        <?php Pjax::begin(); ?>



        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'maxFileSize' => 5000000000

            ],
            'pluginOptions' => [
                'initialPreview' => $picture,
                'maxFileSize' => 5000000000
            ],
        ]); ?>

        <?= BaseHtml::hiddenInput('Item[pictureUrl]', $model->picture); ?>

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
                'imageUpload' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/image-upload']),
                'imageManagerJson' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/images-get']),
                'fileManagerJson' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/files-get']),
                'fileUpload' => '/worker/worker/file-upload' //\yii\helpers\Url::to(['/worker/worker/file-upload'])
            ],
        ]); ?>

        <?= $form->field($model, 'color')->widget(ColorInput::classname()); ?>

        <?= $form->field($model, 'access')->checkbox([], false); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Добавить'), ['class' => 'btn btn-success']) ?>
        </div>


        <?php Pjax::end(); ?>
        <?php ActiveForm::end(); ?>

    </div>

    <div class="col-md-7">
        <?= $this->render('/regularity/function_buttons', ['quantityDiv' => 2, 'colMd' => 6]) ?>
    </div>
</div>