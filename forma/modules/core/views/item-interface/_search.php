<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemInterfaceSearch */
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
   <?= $form->field($model, 'name_item') ?>
</div>

<div class="col-xs-3">
   <?= $form->field($model, 'id_item') ?>
</div>

<div class="form-group col-xs-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

    <?php ActiveForm::end(); ?>

<?php BoxWidget::end();?>