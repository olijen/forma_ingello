<?php

use forma\modules\core\services\RegularityAndItemPictureService;
use kartik\file\FileInput;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\color\ColorInput;
use yii\helpers\Url;
use vova07\imperavi\Widget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Regularity */
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

$picture = RegularityAndItemPictureService::getPictureUrl($model);
?>

<div class="col-md-6 block">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'name', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

    <?= $form->field($model, 'order', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

    <div class="col-xs-12">
        <?= $form->field($model, 'title')->widget(Widget::className(), [
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
    </div>
    <?= $form->field($model, 'icon', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

    <div class="col-xs-12">
        <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'initialPreview' => $picture,
            ],
        ]); ?>
    </div>
    <?= BaseHtml::hiddenInput('Item[pictureUrl]', $model->picture); ?>

    <?= $form->field($model, 'access')->checkbox([], false); ?>

    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
