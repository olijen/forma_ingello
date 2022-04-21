<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\models\Victim */
/* @var $form yii\widgets\ActiveForm */

if ($model->hasErrors()):
    \wokster\ltewidgets\BoxWidget::begin([
        'solid' => true,
        'color' => 'danger',
        'title' => 'Ошибки валидации',
        'close' => true,
    ]);
    $error_data = $model->firstErrors;
    echo \yii\widgets\DetailView::widget([
        'model' => $error_data,
        'attributes' => array_keys($error_data)
    ]);
    \wokster\ltewidgets\BoxWidget::end();
endif;

?>

<div class="victim-form">

    <?php $form = ActiveForm::begin([]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'how_many')->textInput(['placeholder' => "Сколько вас? (В семье или в группе)", 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?php if ($model->isNewRecord) $model->stay_for = \forma\modules\hr\records\victim\Victim::getStayFor()[array_key_first(\forma\modules\hr\records\victim\Victim::getStayFor())]; ?>
            <?= $form->field($model, 'stay_for')->widget(\kartik\select2\Select2::classname(), [
                'data' => \forma\modules\hr\records\victim\Victim::getStayFor(),
                'value' => $model->stay_for,
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?php if ($model->isNewRecord) $model->phone = '+380'; ?>
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'specialization')->textInput(['placeholder' => "Чем занимается, какие навыки, на кого учится?"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'destination')->textInput(['placeholder' => "Куда планируете уехать потом"]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'questions')->textInput(['placeholder' => "Инвалидность, аллергии, болезни, другие особенности и пожелания"]) ?>
        </div>
    </div>


    <hr>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fullname')->textInput(['placeholder' => "Полное имя, фамилия и отчество"]) ?>
        </div>
        <div class="col-md-6">
            <br>
            <?= $form->field($model, 'is_child')->checkbox([], false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php
                if ($model->isNewRecord) $model->registered_at = date('d.m.Y');
            ?>
            <?= $form->field($model, 'registered_at')->textInput()->widget(DatePicker::className(), [
                'pluginOptions' => [
                    'format' => 'dd.mm.yyyy',
                    'autoclose' => true,
                ], 'options' => ['style' => 'left: 0']]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'birthday')->textInput(['placeholder' => "Дата рождения"])->widget(DatePicker::className(), [
                'pluginOptions' => [
                    'format' => 'dd.mm.yyyy',
                    'autoclose' => true,
                ], 'options' => []]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'place_of_residence')->textInput(['placeholder' => "Где прописан по документам"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'second_residence')->textInput(['placeholder' => "Где проживает по факту"]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name_where_to_settle')->textInput(['placeholder' => "Название места поселения"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'settlement_address')->textInput(['placeholder' => "Адрес места поселения"]) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-6">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary']) ?>
        </div>
        <div class="col-md-6 col-md-6">
            <a href="/hr/victim" class="btn btn-block btn-warning">Отменить</a>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
