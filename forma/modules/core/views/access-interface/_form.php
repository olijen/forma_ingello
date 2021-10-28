<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\AccessInterface */
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

<div class="access-interface-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
            <?= $form->field($model, 'current_mark',['options'=>['class'=>'col-xs-12']])->textInput() ?>

            <?= $form->field($model, 'rule_id',['options'=>['class'=>'col-xs-12']])->dropDownList(
                $rules
            ) ?>

            <?= $form->field($model, 'user_id',['options'=>['class'=>'col-xs-12']])->dropDownList(
                $users
            ) ?>

            <?= $form->field($model, 'status',['options'=>['class'=>'col-xs-12']])->dropDownList(
                ['0'=>'false','1'=>'true']
            ) ?>


        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
