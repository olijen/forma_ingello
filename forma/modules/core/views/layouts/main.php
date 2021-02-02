<?php

use yii\helpers\Url;
use yii\helpers\Html;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use forma\modules\product\records\Product;
use dmstr\helpers\AdminLteHelper;
use yii\bootstrap\Modal;

/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        forma\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        $bgColor = '#00a65a';
        if ('selling' == Yii::$app->controller->module->id) {
            $bgColor = '#58628e';
        } elseif ('hr' == Yii::$app->controller->module->id) {
            $bgColor = '#F08080';
        } elseif ('product' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
        } elseif ('warehouse' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
        } elseif ('country' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
        } elseif ('customer' == Yii::$app->controller->module->id) {
            $bgColor = '#58628e';
        } elseif ('worker' == Yii::$app->controller->module->id) {
            $bgColor = '#F08080';
        } elseif ('vacancy' == Yii::$app->controller->module->id) {
            $bgColor = '#F08080';
        } elseif ('inventorization' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
        } elseif ('purchase' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
        } elseif ('transit' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
        }
        ?>

        <meta name="theme-color" content="<?php echo $bgColor ?>">


        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!-- todo: Перенести в зависимости -->
        <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>

        <?php if (!isset($_GET['without-header'])) :
            Yii::debug('JIVO SITE');

            ?>
            <!-- BEGIN JIVOSITE CODE {literal} -->
            <script type='text/javascript'>
                (function () {
                    var widget_id = 'OG66j2R9YL';
                    var d = document;
                    var w = window;

                    function l() {
                        var s = document.createElement('script');
                        s.type = 'text/javascript';
                        s.async = true;
                        s.src = '//code.jivosite.com/script/widget/' + widget_id
                        ;var ss = document.getElementsByTagName('script')[0];
                        ss.parentNode.insertBefore(s, ss);
                    }

                    if (d.readyState == 'complete') {
                        l();
                    } else {
                        if (w.attachEvent) {
                            w.attachEvent('onload', l);
                        } else {
                            w.addEventListener('load', l, false);
                        }
                    }
                })();
            </script>
            <!-- {/literal} END JIVOSITE CODE -->
        <?php endif ?>
    </head>
    <body id="body1" class="hold-transition sidebar-mini sidebar-collapse <?= AdminLteHelper::skinClass() ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <div class="loader-wrapper" style="">
            <div id="loader">
            </div>
        </div>

        <?php

        $js = <<<JS
var i = 1;
$("#fs").click(function () {
   i++;
  if($.support.fullscreen){
	$("body").fullScreen();
	if (i % 2 == 0) {
	  $("#fs").html($('<i class="fa fa-compress"></i>'));
	} else {
	  $("#fs").html($('<i class="fa fa-expand"></i>'));
	}
  } else {
    alert('Фул скрин не подключен');
  }
});
JS;
        $this->registerJs($js);

        $bgColor = '';
        $bgColorPrimary = '#58628e';
        $color = '';
        $textColor = '';
        $hoverP = '#228957';
        $hoverS = '';
        $a = '';

        if ('selling' == Yii::$app->controller->module->id) {
            $bgColor = '#58628e';
            $bgColorPrimary = '#D0B676';
            $color = 'white';
            $hoverP = '#9C8D69';
            $hoverS = '#1D285C';

        } elseif ('product' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
            $bgColorPrimary = '#399F85';
            $hover = '#9F4D1D';
            $color = 'white';
            $hoverP = '#3E7769';
            $hoverS = '#9F4D1D';
            $a = '#f49258';
        } elseif ('hr' == Yii::$app->controller->module->id) {
            $bgColor = '#F08080';
            $bgColorPrimary = '#66C066';
            $color = 'white';
            $hoverP = '#228957';
            $hoverS = '#9C2A2A';
            $a = '#F08080';
        } elseif ('project' == Yii::$app->controller->module->id) {
            $bgColor = '#F08080';
            $bgColorPrimary = '#66C066';
            $color = 'white';
            $hoverP = '#228957';
            $hoverS = '#9C2A2A';
            $a = '#F08080';
        } elseif ('worker' == Yii::$app->controller->module->id) {
            $bgColor = '#F08080';
            $color = 'white';
            $hoverP = '#228957';
            $hoverS = '#9C2A2A';
            $a = '#F08080';
        } elseif ('vacancy' == Yii::$app->controller->module->id) {
            $bgColor = '#F08080';
            $color = 'white';
            $hoverP = '#228957';
            $hoverS = '#9C2A2A';
            $a = '#F08080';
        } elseif ('country' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
            $hover = '#9F4D1D';
            $color = 'white';
            $hoverP = '#3E7769';
            $hoverS = '#9F4D1D';
            $a = '#f49258';
            $a = '#f49258';
        } elseif ('warehouse' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
            $hover = '#9F4D1D';
            $color = 'white';
            $hoverP = '#3E7769';
            $hoverS = '#9F4D1D';
            $a = '#f49258';
        } elseif ('purchase' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
            $hover = '#9F4D1D';
            $hover = '#9F4D1D';
            $color = 'white';
            $hoverP = '#3E7769';
            $hoverS = '#9F4D1D';
            $a = '#f49258';
        } elseif ('transit' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
            $hover = '#9F4D1D';
            $color = 'white';
            $hoverP = '#3E7769';
            $hoverS = '#9F4D1D';
            $a = '#f49258';
        } elseif ('customer' == Yii::$app->controller->module->id) {
            $bgColor = '#00a65a';
            $color = 'white';
        } elseif ('inventorization' == Yii::$app->controller->module->id) {
            $bgColor = '#f49258';
            $color = 'white';
        }
        ?>

        <style>

            .table-striped > tbody > tr:hover * {
                background-color: <?php echo $bgColor ?> !important;
                color: <?php echo $color?> !important;
            }

            .info-box, .box, .form-control, .redactor-box,
            .navbar, .navbar-static-top, .main-sidebar, .btn, s .select2-selection {
                box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5), 1px 1px 3px rgba(0, 0, 0, 0.22) !important;
                border-radius: 2px !important;
            }

            .form-control, .redactor-box,
            .navbar, .navbar-static-top, .main-sidebar, .btn, .select2-selection {
                border: 0;
            }


            .skin-green-light .main-header li.user-header,
            .pagination > .active > a, .pagination > .active > a:hover,
            .skin-green-light .main-header .navbar,
            .btn-group > .btn:first-child,
            .list-group-item.active,
            .list-group-item.hover,
            .header-list,
            .btn-success,
            .btn-primary,
            .logo-mini,
            .logo,
            .bg-green {
                background-color: <?php echo $bgColor ?> !important;
            }

            .btn-primary:hover {
                background-color: <?php  echo $hoverP ?> !important;
            }

            .btn-success:hover {
                background-color: <?php echo $hoverS ?> !important;
            }

            .bg-blue {
                background-color: #58628e !important;
            }

            .bg-yellow {
                background-color: #f49258 !important;
            }

            .bg-red {
                background-color: #F08080 !important;
            }

            <?php if ('selling'!= Yii::$app->controller->module->id && 'core' != Yii::$app->controller->module->id) : ?>
            .box-success {
                border-color: <?php echo $bgColor ?> !important;
            }

            <?php endif ?>

            /* scroll */

            ::-webkit-scrollbar {
                width: 7px;
            }

            ::-webkit-scrollbar-thumb {
                border-width: 3px 3px 3px 2px;
                border-color: <?php echo $bgColor ?>;
                background-color: <?php echo $bgColor ?>;
            }

            ::-webkit-scrollbar-thumb:hover {
                border-width: 1px 1px 1px 2px;
                border-color: <?php echo $bgColorPrimary ?>;
                background-color: <?php echo $bgColorPrimary ?>;
            }

            ]
            ::-webkit-scrollbar-track {
                border-width: 0;
            }

            ::-webkit-scrollbar-track:hover {
                border-left: solid 1px<?php echo $bgColor ?>;
                background-color: <?php echo $bgColor ?>;
            }

            .container-fluid {
                padding: 0;
            }

            /* Misha ept */
            section.content > section.content {
                padding: 0;
            }

            /*section.content {
                padding: 0;
            }*/

            .menu a {
                color: #008d4c !important;
            }

            .btn {
                margin-bottom: 4px;
            }

            .modal-body {
                padding: 3px;
            }

            .modal-header .close {
                background: red;
                border-radius: 50%;
                color: white;
                font-size: 28px;
                height: 32px;
                opacity: 0.7;
                width: 32px;
            }

            .modal-header p {
                font-size: 20px;
                margin: 0;
            }

            .modal-header .close:hover {
                background: transparent;
                color: red;
                opacity: 1;
            }

            h1 {
                padding-left: 3px;
            }

            @media screen and (max-width: 768px) {
                .col-md-12, .col-md-6, .col-md-4, .col-xs-12, .tab-content {
                    padding: 0 !important;
                }

                .row {
                    margin: 0;
                    padding: 0;
                }

                .navbar-custom-menu .dropdown-menu {
                    width: 100% !important;
                }
            }

            .breadcrumb {
                display: none !important;
            }

            #loader {
                text-align: center;
                position: fixed;
                left: 50%;
                top: 50%;
                z-index: 9999;
                width: 150px;
                height: 150px;
                margin: -75px 0 0 -75px;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                -webkit-animation: spin 2s linear infinite; /* Safari */
                animation: spin 2s linear infinite;
                border-top: 16px solid #209a25;
                border-right: 16px solid #b45372;
                border-bottom: 16px solid #6d7bb6;
                border-left: 16px solid #c2875b;
                opacity: 0.5;
                filter: alpha(opacity=70);
                -moz-opacity: 0.7;
            }

            /* Safari */
            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                }
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>

        <script>
            $(document).ready(function () {

                hideLoader();

                console.log('ready');
                $("a, input[type=submit], button[type=submit]").click(function (event) {
                    if ($(this).hasClass('no-loader')) return ;
                    let href = $(this).attr('href');
                    if (href == '#') return;
                    if (href && href[0] == '#') return;
                    showLoader();
                });

                $('.grid-view, .editable-grid').find('thead').find('a').addClass('no-loader');
            });

            function showLoader() {
                document.getElementById("loader").style.display = "block";
                $('body').css('pointer-events', 'none');
                setTimeout(() => {
                    hideLoader();
                }, 5000);
            }

            function hideLoader() {
                document.getElementById("loader").style.display = "none";
                $('body').css('pointer-events', 'all');
            }


        </script>

        <?php Yii::debug('существует визаут хедер?'); ?>
        <?php Yii::debug(isset($_GET['without-header'])); ?>

        <?php if (!isset($_GET['without-header'])) : ?>
            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>

            <?= $this->render(
                'left.php',
                ['directoryAsset' => $directoryAsset]
            )
            ?>

        <?php endif ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?= Modal::widget([
        'id' => 'select-modal',
        'header' => '<p>FORMA . INGELLO 2021</p>',
    ]) ?>

    <?= Modal::widget([
        'id' => 'select-modal-2',
        'header' => 'FORMA . INGELLO 2020',
    ]) ?>
    <script>
        if (window.location.href.indexOf('without-header') > 0) {
            console.log(1);

            let aLinks = document.getElementsByTagName('a');
            let forms = document.getElementsByTagName('form');

            for (let i = 0; i < aLinks.length; i++) {
                // console.log(aLinks[i]);
                // console.log(aLinks[i].href);
                let beginParameters = aLinks[i].href.indexOf('?')+1;
                if(beginParameters > 0) {
                    let beginStr = aLinks[i].href.substring(0, beginParameters);
                    let endStr = aLinks[i].href.substring(beginParameters, aLinks[i].href.length);
                    // console.log(aLinks[i].href.indexOf('?'));
                    // console.log(aLinks[i].href.substring(0, beginParameters));
                    // console.log(aLinks[i].href.substring(beginParameters, aLinks[i].href.length));
                    aLinks[i].href = beginStr + 'without-header=&' + endStr;
                    console.log(aLinks[i]);
                    console.log(aLinks[i].href);
                }
                else aLinks[i].href += '?without-header';
            }

            for (let i = 0; i < forms.length; i++) {
                // console.log(aLinks[i]);
                // console.log(aLinks[i].href);
                let beginParameters = forms[i].action.indexOf('?')+1;
                if(beginParameters > 0) {
                    let beginStr = forms[i].action.substring(0, beginParameters);
                    let endStr = forms[i].action.substring(beginParameters, forms[i].action.length);
                    // console.log(aLinks[i].href.indexOf('?'));
                    // console.log(aLinks[i].href.substring(0, beginParameters));
                    // console.log(aLinks[i].href.substring(beginParameters, aLinks[i].href.length));
                    forms[i].action = beginStr + 'form-without-header=&' + endStr;
                }
                else forms[i].action += '?without-header';
            }
        }
    </script>
    <?php $this->endBody() ?>

    </body>
    <?php Yii::debug(Yii::$app->params['globalQueries']); ?>
    <?php Yii::debug('globalQueries'); ?>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
