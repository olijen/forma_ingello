<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\sellinghistory\SellingHistory */
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

<div class="selling-history-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
            <?= $form->field($model, 'date', ['addon' => ['prepend' => ['content' => '<i class="fa fa-calendar"></i>']],'options'=>['class'=>'col-xs-12 col-md-6']])->widget(\kartik\datecontrol\DateControl::className(),[
                    'type'=>'date',
                    ])
             ?>

            <?= $form->field($model, 'date_from',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'date_to',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'count',['options'=>['class'=>'col-xs-12']])->textInput() ?>


        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
