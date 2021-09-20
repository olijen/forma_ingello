<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\customersource\CustomerSourceSearch */
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
   <?= $form->field($model, 'name') ?>
</div>


<div class="col-xs-3">
   <?= $form->field($model, 'order') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'description') ?>
=======
<div class="col-xs-3">
   <?= $form->field($model, 'content') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'theme') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'user') ?>
</div>

<div class="form-group col-xs-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

    <?php ActiveForm::end(); ?>

<?php BoxWidget::end();?>