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

//echo Yii::getAlias('@bower');

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
<div class="login-box">
    <div class="login-logo">
      <a style="color: #f4f4f4;"><b>FORMA</b> <i class="fa fa-newspaper-o"></i> INGELLO</a>
      <hr>
      <h4 style="color: white;">Демонстрационный веб сервис для автоматизации и мониторинга</h4>
      <h6 style="color: white;">Разработано компанией <a style="color: red;" href="http://ingello.com">Ingello</a></h6>
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
        'header' => 'FORMA . INGELLO 2019',
    ]) ?>

    <?php
        $js = <<<JS
        $(document).ready(function() {
            setInterval(function () {
                setTimeout(function() {
                    $('#info').css('color', '#aaeeaa');
                }, 250);
                $('#info').css('color', 'white');
            }, 500);
        })
JS;
    $this->registerJs($js);

    ?>

    <!-- /.login-logo -->
    <div class="login-box-body">

        <?php

        $model->email = 'admin@admin.admin';
        $model->password = '111111';
        $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => true]); ?>

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
                <a href="<?= Url::to(['/signup']) ?>" class="btn btn-danger btn-block btn-flat">Создать аккаунт</a>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->

            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>

            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-xs-12">
                <p>Войти как пользователь:</p>
            </div>
            <div class="col-xs-12 text-center">
                <?php echo "<a style='background-color: rgba(200, 200, 200, 0.4); width: 100%; height: 100%; display:block; padding: 5px 0' class='socialAuthorization' href='$googleLink'><img style='height: 18px; padding-bottom: 2px; padding-right: 6px' src='images/google.png' alt=''>Google</a>"; ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
