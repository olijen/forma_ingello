<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Автоматизация бизнеса с гарантиями';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>
<script>

</script>
<style>
    .login-page {
        /* background-image: url(/images/space.jpg); */
        background-color: #00a65a;
        -moz-background-size: 100%; /* Firefox 3.6+ */
        -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
        -o-background-size: 100%; /* Opera 9.6+ */
        background-size: 100%; /* Современные браузеры */
    }
</style>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<div class="login-box">
    <div class="login-logo">

        <a style="color: #f4f4f4;"><b>FORMA</b> <i style="color: #00f; " class="fa fa-bar-chart"></i> INGELLO</a>
        <!-- /.login-logo -->
        <div class="login-box-body">



            <?php

            $model->email = 'admin@admin.admin';
            $model->password = '111111';
            $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => true]); ?>

            <div style="display: none;">
                <?= $form
                    ->field($model, 'email', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

                <?= $form
                    ->field($model, 'password', $fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

                <div class="row">
                    <div class="col-xs-8">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-4">

                    </div>

                    <!-- /.col -->
                </div>
            </div>


            <div class="row">



            <div class="col col-md-12" style="margin-bottom: 20px;">
                <?= Html::a('<i class="fa fa-lock"></i> ЛИЧНЫЙ АККАУНТ', '/signup', [
                    'class' => 'btn btn-success btn-block btn-flat btn_login',
                    'style' => 'font-size: 20px;',
                    'id'=>'info',
                    'name' => 'login-button']) ?>
            </div>

            <div class="col col-md-12">
                <?php echo "
                <a style='font-size: 20px;' class='btn btn-success btn-block btn-flat btn_login socialAuthorization' href='$googleLink'>
                  <i class='fab fa-google'></i>
                  Зайти через <strong>Google</strong>
                </a>"; ?>
            </div>
            <!--<div class="col col-md-12">
                <?/*= Html::a('Индивидуальный проект', 'https://ingello.com', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button'])    */?>
            </div>-->

            </div>



            <?php ActiveForm::end(); ?>

        </div><!-- /.login-box-body -->






        <?php /*=\forma\components\widgets\ModalSrc::widget([
              'route' => '/core/site/doc?page=login',
              'name' => 'Демонстрация системы',
              'icon' => 'info',
              'color' => 'white',
              'options' => [
                  'id' => 'info',
              ]
          ]) */?>

    </div>

    <?= Modal::widget([
        'id' => 'modal',
        'toggleButton' => false,
        'header' => 'FORMA . INGELLO 2020',
    ]) ?>

    <?php
    $js = <<<JS
          $(document).ready(function() {
              setInterval(function () {
                  setTimeout(function() {
                      $('.btn_login').css('color', '#aaeeaa');
                  }, 250);
                  $('#info').css('color', 'white');
              }, 500);
          })
JS;
    $this->registerJs($js);

    ?>

    <div align="center" class="">
        <br>
        <br>
        <br>
        <a id="logoingello"  target="_blank" href="https://ingello.com" class="">
            <img  style="padding: 5px; width: 75px; filter: drop-shadow(1px 2px 2px #75c4f2);" src="https://ingello.com/img/logos/logo_white_ingello_min.png" />
        </a>
        <!--<br>
        <span><a target="_blank" style="color:#75c4f2;" href="https://ingello.com" class="app">INGELLO 82</a> </span>
        <br>
        <span><a target="_blank" style="color:#75c4f2;" href="https://business.ingello.com" class="app">BUSINES</a> </span>
        <br>
        <span><a target="_blank" style="color:#75c4f2;" href="https://applan.ingello.com" class="app">APPLAN</a></span>
        <br>
        <span><a target="_blank" style="color:#75c4f2;" href="https://dent.ingello.com" class="app">DENT</a></span>
        <br>-->
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
</div><!-- /.login-box -->

