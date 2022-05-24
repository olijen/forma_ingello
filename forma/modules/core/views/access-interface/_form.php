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
            <?= $form->field($model, 'current_mark',['options'=>['class'=>'col-xs-6']])->textInput() ?>

            <?= $form->field($model, 'rule_id',['options'=>['class'=>'col-xs-6']])->dropDownList(
                $rules
            ) ?>

            <?= $form->field($model, 'user_id',['options'=>['class'=>'col-xs-6']])->dropDownList(
                $users
            ) ?>

            <?= $form->field($model, 'status',['options'=>['class'=>'col-xs-6']])->dropDownList(
                ['0'=>'Не выполнил','1'=>'Выполнил']
            ) ?>


        <div class="col-xs-12 col-md-12">
            <div class="form-group" style="text-align:center; padding: 20px;">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить',
                    ['class' => $model->isNewRecord ? 'btn btn-success bg-green' : 'bg-green btn btn-primary','style'=>'width:20%;']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
