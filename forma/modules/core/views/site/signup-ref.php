<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Регистрация';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions4 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-earphone form-control-feedback'></span>"
];

$fieldOptions5 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

?>
<script>
    
</script>
<style>
    .login-page {
        background: #00a65a;
    }
</style>
<div class="login-box">
  <div class="login-logo">
      <h1 href="#" style="color: #f4f4f4;"><b>FORMA</b> <i class="fa fa-bar-chart-o"></i>  INGELLO</h1>
  </div>

    <?php /*=\forma\components\widgets\ModalSrc::widget([
        'route' => '/core/site/doc?page=login',
        'name' => 'Документация',
        'icon' => 'info',
        'color' => 'white',
    ]) */?><!--
    --><?php /*= Modal::widget([
        'id' => 'modal',
        'toggleButton' => false,
    ]) */?>


  <h2 style="color: white; text-align: center;">Настроить бесплатный дочерний аккаунт?</h2>


    <div class="register-box-body">
        <?php if (!Yii::$app->user->isGuest): ?>
            <?php $form = ActiveForm::begin(['id' => 'signup-form', 'options' => ['autocomplete' => 'off'], 'enableClientValidation' => true, 'action' => '/core/site/signup-referer']); ?>
        <?php else: ?>
            <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableClientValidation' => true]); ?>
        <?php endif; ?>
        <?= $form
            ->field($model, 'email', $fieldOptions3)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
        <?= $form
            ->field($model, 'username', $fieldOptions5)
            ->label(false)
            ->textInput(['placeholder' => 'Имя']) ?>
        <?= $form
            ->field($model, 'phone', $fieldOptions4)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'autocomplete' => 'new-password']) ?>

        <?php if (!Yii::$app->user->isGuest): ?>

            <?= $form->field($model, 'parent_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

        <?php endif; ?>

        <?= Html::submitButton('Создать дочерний аккаунт', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>

    </div>



  <div align="center" class="">
    <span><a target="_blank" style="color:#75c4f2;" href="https://applan.ingello.com" class="app">APPLAN | </a></span>
    <span><a target="_blank" style="color:#75c4f2;" href="https://dent.ingello.com" class="app">DENT | </a></span>
    <span><a target="_blank" style="color:#75c4f2;" href="https://business.ingello.com" class="app">BUSINES</a> </span>
    <br>
    <a id="logoingello"  target="_blank" href="https://ingello.com" class="">
      <img  style="padding: 5px; width: 75px; filter: drop-shadow(1px 2px 2px #75c4f2);" src="https://ingello.com/img/logos/logo_white_ingello_min.png" />
    </a>
    <br>
    <span style="color:white; font-size: 75%;"><?=date('Y')?></span>

    <style>
      #logoingello:hover {
        width: 100px;
        filter: drop-shadow(1px 2px 2px #007fff);
      }
      .app:hover {
        width: 100px;
        filter: drop-shadow(1px 2px 2px #007fff);
      }
    </style>

  </div>


    <!-- /.form-box -->
</div>
<!-- /.register-box -->
