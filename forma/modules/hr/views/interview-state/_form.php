<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\interviewstate\InterviewState */
/* @var $form yii\widgets\ActiveForm */

if($model->hasErrors()):
\wokster\ltewidgets\BoxWidget::begin([
'solid'=>true,
'color'=>'danger',
'title'=>'Ошибки валидации',
'close'=> true,
]);
$error_data = $model->firstErrors;
echo \yii\widgets\DetailView::widget([
'model'=>$error_data,
'attributes'=>array_keys($error_data)
]);
\wokster\ltewidgets\BoxWidget::end();
endif;

?>

<div class="interview-state-form">

    <?php $form = ActiveForm::begin([
    ]); ?>

            <?= $form->field($model, 'name', ['options'=>['class'=>'col-xs-12']])->textInput() ?>


            <?= $form->field($model, 'theme',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'order', ['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'description', ['options'=>['class'=>'col-xs-12']])->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,]])?>


    <?= $form->field($model, 'content')->widget(Widget::className(), [
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
            'imageUpload' => \yii\helpers\Url::to(['/project/project/image-upload']),
            'imageManagerJson' => \yii\helpers\Url::to(['/project/project/images-get']),
            'fileManagerJson' => \yii\helpers\Url::to(['/project/project/files-get']),
            'fileUpload' => \yii\helpers\Url::to(['/project/project/file-upload'])
        ],
    ]); ?>


        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
