<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\test\records\TestTypeField */
/* @var $form yii\widgets\ActiveForm */
?>
<?php var_dump($test['block_name'])  ?>
<div class="test-type-field-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row" style="margin-top: 30px">
    <div class="col-xs-6">
    <?php echo $test['block_name']?>
    <br>
   <?= $form->field($test,'value')
       ->textInput(['placeholder'=>$test['placeholder']])
       ->label($label = $test['label_name']);?>
   </div>

</div>
<!--    --><?//= $form->field($model, 'block_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
