<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Подтверждение почты';

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

    </div>


    <!-- /.login-logo -->
    <div class="login-box-body">
        <?php if($confirmed) { ?>
            <p>E-mail успешно подтвержден, теперь можете авторизоваться на сайте!<br />
                <a href='http://localhost:3000/login'>Авторизоваться</a></p>
        <?php } else { ?>
        <p>Спасибо за регистрацию! Подтвердите свою почту. Вам было выслано сообщение с ссылкой, подтверждающую
            ваш электронный адрес, пройдите по нему.<br /> <a href='http://localhost:3000/login'>На главную</a></p>
        <?php } ?>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
