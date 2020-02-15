<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\message\records\Message */
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

<div class="message-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
            <?= $form->field($model, 'from_user_id',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'to_user_id',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'title',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'text',['options'=>['class'=>'col-xs-12']])->widget(\vova07\imperavi\Widget::className(),[
                    'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'pastePlainText' => true,
                    'imageUpload' => \yii\helpers\Url::to(['/main/image/save-redactor-img','id'=>null,'sub'=>'message']),
                    'replaceDivs' => false,
                    'plugins' => [
                    'fullscreen',
                    'table'
                    ]
                    ]
                    ])
             ?>

            <?= $form->field($model, 'datetime',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'favorit',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'status',['options'=>['class'=>'col-xs-12']])->textInput() ?>


        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
