<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORMA INGELLO</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/progressive-image.js/dist/progressive-image.css">

</head>
<body>

<?php

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback form-group floating-label-form-group controls mb-0 pb-2'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback form-group floating-label-form-group controls mb-0 pb-2'],
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

<style>
    form {
        margin-top: 25px;
    }

    .button_form_login {
        font-size: 28px;
        width: 75%;
    }

    .button_form_login .button_form_login_icon {
        float: left;
        font-size: 89px;
    }

    .button_form_login .button_form_login_header {
        text-align: left; margin-left: 111px; padding-top: 6px;
    }

    .button_form_login .button_form_login_text {
        color: #617385;
        font-size: 20px;
        margin-left: 111px;
        text-align: left;
    }

    @media (min-width: 992px) {
        header.masthead {
            padding-top: calc(6rem + 104px);
            padding-bottom: 22rem;
        }
    }

    @media screen and (max-width: 768px) {
        .row .lead.text-right,
        .row .lead.text-left  {
            text-align: center!important;
        }
    }

    @media screen and (max-width: 576px) {
        .masthead {
            padding-top: calc(2rem + 74px);
            padding-bottom: 3.5rem;
        }

        h1.masthead-heading {
            margin-top: 100px;
        }

        .divider-custom {
            margin-bottom: 0;
        }

        .button_form_login {
            font-size: 24px;
        }

        .button_form_login .button_form_login_icon {
            font-size: 55px;
        }

        .button_form_login .button_form_login_header {
            margin-left: 75px;
        }

        .button_form_login .button_form_login_text {
            font-size: 17px;
            margin-left: 75px;
        }

        .footer-divider {
            display: none;
        }
    }

    @media screen and (max-width: 410px) {

        .button_form_login {
            font-size: 22px;
            padding: 14px 10px;
            width: 90%;
        }

        .button_form_login .button_form_login_icon {
            font-size: 40px;
        }

        .button_form_login .button_form_login_header {
            margin-left: 55px;
        }

        .button_form_login .button_form_login_text {
            margin-left: 55px;
        }
    }

    .slider-for,
    .slider-nav {
        margin: 0 auto;
        width: 80%;
    }

    .slider-for img {
        border-bottom: 7px solid #58628e;
        width: 100%;
    }

    .slider-for {
        margin-bottom: 30px;
        height: 65vh;
    }

    .slider-nav {
        height: 13vh;
    }

    .slider-for div,
    .slider-for img,
    .slider-nav div,
    .slider-nav img{
        height: 100%!important;;
    }

    .slider-nav .item {
        margin: 0 20px;
    }

    .slider-nav .item img {
        border-bottom: 7px solid #00a65a;
        width: 100%;
    }

    .slider-nav .item.slick-xxx img {
        border-bottom: 7px solid #58628e;
    }

</style>


<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">У ВАС УЖЕ ЕСТЬ ФОРМА</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-chart"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->

                <button  class="btn btn-primary btn-xl button_form_login" id="loginButton" onclick="hideShowForm('login-form', 'loginButton')">
                    <i class="fa fa-check button_form_login_icon" style="color: #38775e;"></i>
                    <div class="button_form_login_header">У меня есть аккаунт</div>
                    <div class="button_form_login_text">Войти в свой аккаунт</div>
                </button>


                <?php

                use yii\bootstrap\ActiveForm;
                use yii\bootstrap\Html;

                $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => true, 'options' => ['style' => 'width: 75%; margin: 0 auto']]);

                ?>

                <div style="">

                    <div class="control-group">
                        <?= $form
                            ->field($modelLogin, 'email', $fieldOptions1)
                            ->label('E-mail', ['class' => 'text-left'])
                            ->textInput(['placeholder' => $modelLogin->getAttributeLabel('email')]) ?>
                    </div>

                    <div class="control-group">
                        <?= $form
                            ->field($modelLogin, 'password', $fieldOptions2)
                            ->label('Пароль', ['class' => 'text-left'])
                            ->passwordInput(['placeholder' => $modelLogin->getAttributeLabel('password')]) ?>
                    </div>
                    <br>
                    <div class="success"></div>

                    <?= Html::submitButton('Войти по паролю <i class="fas fa-arrow-right" style="margin-left: 10px"></i>', ['class' => 'btn btn-primary btn-xl', 'style' => 'width: 100%', 'id'=>'info', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>


                <br>
                <br>
                <button  class="btn btn-primary btn-xl button_form_login" id="signupButton" onclick="hideShowForm('signup-form', 'signupButton')">
                    <i style=" color: #b46666; " class="fa fa-gift button_form_login_icon"></i>
                    <div class="button_form_login_header">У меня нет аккаунта</div>
                    <div class="button_form_login_text">Зарегистрироваться</div>
                </button>
                <br><br>

                <?php if (!Yii::$app->user->isGuest): ?>
                    <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableClientValidation' => true, 'action' =>'/core/site/signup-referer', 'options' => ['style' => 'width: 75%; margin: 0 auto 40px']]); ?>
                <?php else:?>
                    <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableClientValidation' => true, 'options' => ['style' => 'width: 75%; margin: 0 auto 40px']]); ?>
                <?php endif; ?>
                <div class="control-group">
                    <?= $form
                        ->field($model, 'username', $fieldOptions2)
                        ->label(false)
                        ->textInput(['placeholder' => 'Как Вас зовут?']) ?>
                </div>
                <div class="control-group">
                    <?= $form
                        ->field($model, 'phone', $fieldOptions2)
                        ->label(false)
                        ->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
                </div>
                <div class="control-group">
                    <?= $form
                        ->field($model, 'email', $fieldOptions2)
                        ->label(false)
                        ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
                </div>
                <div class="control-group">
                    <?= $form
                        ->field($model, 'password', $fieldOptions2)
                        ->label(false)
                        ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
                </div>
                <br>
                <div class="success"></div>
                <?php if (!Yii::$app->user->isGuest): ?>

                    <?=$form->field($model, 'parent_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

                <?php endif; ?>

                <?= Html::submitButton('Создать аккаунт <i class="fas fa-arrow-right" style="margin-left: 10px"></i>', ['class' => 'btn btn-primary btn-xl',  'style' => 'width: 100%', 'name' => 'signup-button']) ?>

                <?php ActiveForm::end(); ?>


                <a class="btn btn-primary btn-xl button_form_login" id="sendMessageButton" href='<?=$googleLink?>'>
                    <i  class='fab fa-google button_form_login_icon' style="color: #fff;"></i>
                    <div class="button_form_login_header">Войти через Google</div>
                    <div class="button_form_login_text">Без пароля и почты</div>
                </a>
            </div>
        </div>

        <br>
        <br>

        <h5 class="page-section-heading text-center text-uppercase text-secondary mb-0"><a href="/?landing">А ЧТО ТАКОЕ "ФОРМА"?</a></h5>


        <br>
        <br>

        <div class="divider-custom">
            <div class="divider-custom-line footer-divider "></div>
            <div class="divider-custom-icon text-center" style="font-size: 13px;">Нажимая на кнопку, Вы соглашаетесь на обработку своих пользовательских данных</div>
            <div class="divider-custom-line footer-divider"></div>
        </div>
        <div class="divider-custom">
            <div class="divider-custom-line footer-divider"></div>
            <div class="divider-custom-icon" style="font-size: 13px;">ingello 82 - все права защищены <i class="fa fa-copyright"></i> <?= date('Y') ?></div>
            <div class="divider-custom-line footer-divider"></div>
        </div>
    </div>
</section>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
<div class="scroll-to-top d-lg-none position-fixed">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
</div>

<!-- Core theme JS-->
<!--<script src="/js/scripts.js"></script>-->


<!-- Slider JS-->

<script>
    function hideShowForm(formName, id) {
        $('#login-form').hide();
        $('#signup-form').hide();

        let formButton = document.getElementById(id);
        let clientOffset = formButton.getBoundingClientRect().y + pageYOffset + 100;

        window.scrollTo({
            top: clientOffset,
            behavior: 'smooth'
        });
        scrollTo(0, clientOffset);

        $("#" + formName).show();
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        $('#login-form').hide();
        $('#signup-form').hide();
        <?php if (isset($_GET['failedLogin'])) {?>
            $('#login-form').show();
        <?php } ?>
        <?php if (isset($_GET['failedSignup'])) { ?>
            $('#signup-form').show();
        <?php } ?>
    });

</script>

</body>
</html>