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
      <a href="#" style="color: #f4f4f4;"><b>FORMA</b> <i class="fa fa-newspaper-o"></i>  INGELLO</a>
  </div>
  <hr>
  <h4 style="color: white;">Демонстрационный веб сервис для автоматизации и мониторинга</h4>
  <h6 style="color: white;">Разработано компанией <a style="color: red;" href="http://ingello.com">Ingello</a></h6>

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

    <div class="register-box-body">
        <p class="login-box-msg">Регистрация нового пользователя</p>
        <?php if (!Yii::$app->user->isGuest): ?>
            <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableClientValidation' => true, 'action' =>'/core/site/signup-referer' ]); ?>
        <?php else:?>
        <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableClientValidation' => true]); ?>
        <?php endif; ?>
        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
        <?= $form
            ->field($model, 'phone', $fieldOptions4)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
        <?= $form
            ->field($model, 'email', $fieldOptions3)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
        <?php if (!Yii::$app->user->isGuest): ?>

            <?=$form->field($model, 'parent_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

        <?php endif; ?>

        <div class="row">

          <div class="col-xs-8">
            <a href="<?= Url::to(['/login']) ?>" class="btn btn-danger btn-block btn-flat">Я уже регистрировался</a>
          </div>
          <!-- /.col -->

          <div class="col-xs-4">
              <?= Html::submitButton('Далее', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
          </div>

        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
