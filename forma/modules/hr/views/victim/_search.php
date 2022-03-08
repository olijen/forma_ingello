<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\models\VictimSearch */
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
   <?= $form->field($model, 'fullname') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'birthday') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'is_child') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'place_of_residence') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'second_residence') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'name_where_to_settle') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'settlement_address') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'phone') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'registered_at') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'stay_for') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'questions') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'specialization') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'destination') ?>
</div>

<div class="form-group col-xs-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

    <?php ActiveForm::end(); ?>

<?php BoxWidget::end();?>