<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rule */
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

<div class="rule-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
            <?= $form->field($model, 'action',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'model',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'mark',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'item_id',['options'=>['class'=>'col-xs-12']])->textInput() ?>


        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
