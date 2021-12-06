<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\superselling\SellingSearch */
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
   <?= $form->field($model, 'customer_id') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'warehouse_id') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'state_id') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'name') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'date_create') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'date_complete') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'dialog') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'next_step') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'selling_token') ?>
</div>

<div class="form-group col-xs-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

    <?php ActiveForm::end(); ?>

<?php BoxWidget::end();?>