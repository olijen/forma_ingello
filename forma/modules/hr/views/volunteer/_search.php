<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\volunteer\VolunteerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php BoxWidget::begin([
    'title' => 'расширенный поиск',
    'hide' => true,
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
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList(), ['prompt' => ''])
    ?>
</div>

<div class="col-xs-3">
    <?= $form->field($model, 'full_name') ?>
</div>

<div class="col-xs-3">
    <?= $form->field($model, 'phone') ?>
</div>

<div class="col-xs-3">
    <?= $form->field($model, 'support_type') ?>
</div>

<div class="col-xs-3">
    <?= $form->field($model, 'comment') ?>
</div>

<div class="col-xs-3">
    <?= $form->field($model, 'capacity') ?>
</div>

<div class="col-xs-3">
    <?= $form->field($model, 'options') ?>
</div>

<div class="col-xs-3">
    <?= $form->field($model, 'created_at') ?>
</div>

<div class="form-group col-xs-12">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php BoxWidget::end(); ?>
