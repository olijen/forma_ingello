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

</style>



<!-- Navigation-->
<div id="page-top"></div>
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Как это выглядит</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Почему бесплатно?</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Как автоматизировать бизнес?</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center" style="background: url(/images/background.jpg); background-size: cover; height: 80%;">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->

        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0" style="">Бесплатная система для развития малого бизнеса</p>
<br><br>
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0" style="position: relative; right: 6px">> FORMA . INGELLO</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-chart-line"></i></div>
            <div class="divider-custom-line"></div>
        </div>

    </div>
</header>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Наведёт порядок</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-check"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            <div class="col-md-6">
                <img class="masthead-avatar mb-5" src="/images/forma_interface.jpg" style="width: 100%" alt="" />
            </div>
            <div class="col-md-6">
                <p>
                    Всё великое начинается с простого. ФОРМА - это упрощенная <strong>компьютерная веб программа</strong> для систематизации бизнеса. Создана для ценителей простого решения сложных задач. Её начали разрабатывать в компании ingello много лет назад. Программа эффективно наводит порядок в делах. И сейчас мы хотим безвозмездно поделиться этой разработкой с предпринимателями с целью совместно улучшать программу, чтобы он развивал бизнес всех, кто ей пользуется.
                </p>
                <p>
                    Мы хотели бы начать наши взаимоотношения, вручив Вам два подарка. Первый - это <strong>бесплатный аккаунт</strong> для Вашего бизнеса. Второй - это <strong>инструктаж по использованию</strong>, который поможет освоить преимущества нашей системы ФОРМА, Но для начала Вам следует кое-что знать...

                </p>
            </div>

        </div>
    </div>
</section>
<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white"><img src="/images/dark_logo.png" style="width: 150px;"/></h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-dollar-sign"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto"><p class="lead text-right">Инструмент для развития <br> бизнеса. Система бесплатна
                    <br> потому что у нас <strong style="border-bottom: 3px solid white">есть цель</strong>:</p></div>
            <div class="col-lg-4 col-md-6 mr-auto"><p class="lead text-left">Стать Вашим надежным ИТ <br> партнёром И предоставлять
                    <br> <strong style="border-bottom: 3px solid white">дорогие</strong> ИТ услуги в будущем</p></div>
        </div>

        <div class="row">
            <div class="col-md-12"><p class="lead text-center">
                    <br>
                    <strong style="color: #215c5f">Внимание!</strong>
                    <br>
                    Система на данный момент на стадии разработки,
                    <br>
                    потому просим соблюдения информационной безопасности: <br>
                    не вводите в систему конфиденциальные данные
                    <br>

                </p></div>
        </div>

    </div>
</section>
<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">У ВАС УЖЕ ЕСТЬ ФОРМА ?</h2>
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

                <button  class="btn btn-primary btn-xl button_form_login" id="sendMessageButton" onclick="hideShowForm('login-form')">
                    <i class="fa fa-check button_form_login_icon" style="color: #38775e;"></i>
                    <div class="button_form_login_header">У меня есть аккаунт</div>
                    <div class="button_form_login_text">Войти в свой аккаунт</div>
                </button>


                <?php
                use yii\bootstrap\ActiveForm;
                use yii\bootstrap\Html;

                $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['style' => 'width: 75%; margin: 0 auto']]);

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
                <button  class="btn btn-primary btn-xl button_form_login" id="sendMessageButton" onclick="hideShowForm('signup-form')">
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

                <?= Html::submitButton('Создать аккаунт <i class="fas fa-arrow-right" style="margin-left: 10px"></i>', ['class' => 'btn btn-primary btn-xl',  'style' => 'width: 100%', 'name' => 'login-button']) ?>

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
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->

<!-- Core theme JS-->
<script src="/js/scripts.js"></script>
<script src="/js/yii.activeForm.js"></script>
<script src="/js/yii.captcha.js"></script>
<script src="/js/yii.gridView.js"></script>
<script src="/js/yii.js"></script>
<script src="/js/yii.validation.js"></script>
<script>
    $('#login-form').hide();
    $('#signup-form').hide();

    function hideShowForm(formName) {
        $('#login-form').hide();
        $('#signup-form').hide();

        $("#"+formName).show();
    }


</script>

</body>
</html>