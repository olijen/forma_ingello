<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\superselling\Selling */
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

<div class="selling-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
            <?= $form->field($model, 'customer_id',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'warehouse_id',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'state_id',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'name',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'date_create',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'date_complete',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'dialog',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'next_step',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'selling_token',['options'=>['class'=>'col-xs-12']])->textInput() ?>


        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
