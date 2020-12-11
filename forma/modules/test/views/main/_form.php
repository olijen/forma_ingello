<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestType */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-xs-8">
    <div class="btn btn-lg">
        <a href="/test/main">Вернуться к списку</a>
    </div>
</div>
<div class="test-type-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-6"><?= $form->field($model, 'name')
                ->textInput(['maxlength' => true])->label($label = 'Название теста' )
            ?>
        </div>
        <div class="col-xs-6"><?= $form->field($model, 'link')
                ->hiddenInput(['value'=>'test/test/test?id=','maxlength' => true])
                ->label($label = '')
            ?>
        </div>
    </div>
    <div class="col-xs-4">
        <?= Html::submitButton('<i class="fa fa-save"></i>'. ' '.'Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
