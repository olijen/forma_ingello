<?php

use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\message\records\MessageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php BoxWidget::begin([
        'title'=>'расширенный поиск',
        'hide'=>true,
]);
?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="col-xs-3">
   <?= $form->field($model, 'id') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'from_user_id') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'to_user_id') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'title') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'text') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'datetime') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'favorit') ?>
</div>

<div class="col-xs-3">
    <?=         $form->field($model, 'status')->dropDownList($model->getStatusList(),['prompt'=>''])
     ?>
</div>

<div class="form-group col-xs-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

    <?php ActiveForm::end(); ?>

<?php BoxWidget::end();?>