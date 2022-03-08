<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Victim */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="victim-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'birthday')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'is_child')->checkbox() ?>

    <?= $form->field($model, 'place_of_residence')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'second_residence')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_where_to_settle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'settlement_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'registered_at')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'stay_for')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'questions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'specialization')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'destination')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
