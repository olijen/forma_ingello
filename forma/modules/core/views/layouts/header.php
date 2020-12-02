<?php

use forma\modules\core\components\LinkHelper;
use forma\modules\core\records\SystemEventSearch;
use forma\modules\core\widgets\SalesFunnelWidget;
use forma\modules\selling\forms\SalesProgress;
use forma\modules\warehouse\records\WarehouseSearch;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<div class="loader-wrapper"  style="">
    <div id="loader">
    </div>
</div>

<?php if (!Yii::$app->user->isGuest) { ?>
    <header class="main-header">

        <?= Html::a('
        <span class="logo-mini">F.I</span>
        <span class="logo-lg">' . Yii::$app->name . '</span>', '#', ['class' => 'logo', 'data-toggle' => "push-menu", 'role' => "button"]) ?>

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

        <nav style="position: fixed; box-shadow: 0 0 10px rgba(0,0,0,0.5); top: 0; height: 50px;" class="navbar navbar-static-top"
             role="navigation">

            <a href="#" data-toggle="push-menu"
               style="color: white; float: left; background-color: transparent; background-image: none;  padding: 15px 15px;  font-family: fontAwesome;"
               class="logo-mini"><i class="fa fa-bars" aria-hidden="true"></i></a>

            <a href="#" title="Вернуться назад"
               style="color: white; float: left; background-color: transparent; background-image: none;  padding: 15px 15px;  font-family: fontAwesome;"
               onclick="window.history.back()">
                <i class="fa fa-arrow-left"></i></a>
            <a href="#" id="fs" title="На весь экран"
               style="color: white; float: left; background-color: transparent; background-image: none;  padding: 15px 15px;  font-family: fontAwesome;">
                <i class="fa fa-expand"></i></a>

            <div class="navbar-custom-menu">


                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <?php

                        if (Yii::$app->user->identity->username == 'admin') {

                            echo \forma\components\widgets\ModalSrc::widget([
                                'route' => '/core/site/doc?page=layout',
                                'name' => '',
                                'icon' => 'info',
                                'color' => 'white',
                                'options' => [
                                    'id' => 'info',
                                ]
                            ]);

                            $js = <<<JS
                        $(document).ready(function() {
                            var i = setInterval(function () {
                                setTimeout(function() {
                                    $('#info').css('color', '#00f');
                                }, 250);
                                $('#info').css('color', '#0f0');
                            }, 500);
                            
                            setTimeout(function() {
                              clearInterval(i);
                              $('#info').css('color', '#ffffff');
                              setInterval(function () {
                                setTimeout(function() {
                                    $('#info').css('color', '#f00');
                                }, 1000);
                                $('#info').css('color', 'white');
                            }, 2000);
                            }, 5000);
                        })
JS;
                            $this->registerJs($js);
                        }

                        ?>
                    </li>
                    <!--  СОБЫТИЯ -->
                    <?php
                    $searchModelHeader = new SystemEventSearch();
                    $dataProviderHeader = Yii::$app->cache->getOrSet('dataProviderHeader', function () use ($searchModelHeader) {
                        return $searchModelHeader->search(Yii::$app->request->queryParams);
                    });

                    ?>
                    <li class="dropdown events-menu tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-history"></i>
                            <span class="label label-danger"><?= count($searchModelHeader->search(Yii::$app->request->queryParams)->models); ?></span>
                        </a>
                        <ul class="dropdown-menu" style="width: 400px; left: 0; padding: 5px;">
                            <li class="header"><?= count($searchModelHeader->search(Yii::$app->request->queryParams)->models); ?>
                                последних событий
                            </li>
                            <li>
                                <!-- КЛасс меню нужен для того чтобы ограничить окно просмотра виджета, а также чтобы
                                не было удаления линии которая проходит сквозь весь таймлайн-->
                                <div class="menu">

                                    <ul class="timeline">
                                        <?php

                                        $eventDate = "";
                                        $icon = "";
                                        Yii::debug($searchModelHeader->search(Yii::$app->request->queryParams)->models);
                                        foreach ($searchModelHeader->search(Yii::$app->request->queryParams)->models as $model) {

                                            foreach (Yii::$app->params['icons'] as $kIcon => $vIcon) {
                                                if ($model->class_name == $kIcon) {
                                                    $icon = $vIcon;
                                                }
                                            }
                                            $color = "";
                                            foreach (Yii::$app->params['colors'] as $app => $colorValue) {
                                                if ($model->application == $app) $color = $colorValue;
                                            }
                                            $arr = [];
                                            $linkView = "";
                                            $event = "";
                                            if (strlen($model->request_uri) > 0 && $model->sender_id != 1) {
                                                $arr = explode("/", $model->request_uri);
                                                $linkView = "/" . $arr[1] . "/" . $arr[2];
                                                if (count($arr) > 3) $event = substr($arr[3], 0, 6);
                                            }
                                            if ($eventDate != substr($model->date_time, 0, 10)) {
                                                ?>

                                                <!-- timeline time label -->
                                                <li class="time-label">
        <span class="bg-red">
            <?= substr($model->date_time, 0, 10) ?>
        </span>
                                                </li>
                                            <?php } ?>
                                            <!-- /.timeline-label -->

                                            <!-- timeline item -->
                                            <li>
                                                <!-- timeline icon -->
                                                <i class="fa fa-<?= $icon != "" ? $icon : 'envelope' ?>"
                                                   style="background-color: <?= $color ?>; color: #fff"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i
                                                                class="fa fa-clock-o"></i> <?= substr($model->date_time, 11, 5) ?></span>

                                                    <h3 class="timeline-header">В отделе <a
                                                                href="#"><?= $model->application ?></a> произошло
                                                        событие</h3>
                                                    <div class="timeline-body">
                                                        <?= $model->data ?>
                                                    </div>
                                                    <?php
                                                    //todo: пока что не выводим
                                                    if ($model->sender_id != 1 && false) { ?>
                                                        <div class="timeline-footer">
                                                            <p>Посмотреть список в
                                                                модуле: <?php LinkHelper::replaceUrlOnButton(" {{" . Url::to($linkView . "||" . $model->class_name . "}}")) ?></p>

                                                            <p><?php if ($event != "delete") { ?>Посмотреть на объект: <?php LinkHelper::replaceUrlOnButton(" {{" . Url::to($linkView . "/update?id=" . $model->sender_id . "||" . $model->class_name . "}}")) ?><?php } ?></p>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <?php
                                            $eventDate = substr($model->date_time, 0, 10);
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <li class="footer">
                                <a href="/core/system-event/">Перейти ко всем событиям</a>
                            </li>
                        </ul>
                    </li>

                    <!-- ВОРОНКА ПРОДАЖ И ПОСЛЕДНИЕ 5 КЛИЕНТОВ -->
                    <li class="dropdown events-menu tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-money-bill-wave"></i>
                            <span class="label label-danger"><?= count(\forma\modules\selling\records\selling\Selling::getList()) ?></span>
                        </a>
                        <ul class="dropdown-menu" style="left: 0; padding: 5px;">
                            <li class="header">Продажи</li>
                            <li>
                                <!-- КЛасс меню нужен для того чтобы ограничить окно просмотра виджета, а также чтобы
                                не было удаления линии которая проходит сквозь весь таймлайн-->
                                <div class="menu">
                                    <div class="chart">

                                        <?= SalesFunnelWidget::widget(['onlyChart' => true]) ?>
                                    </div>
                                    <?php
                                    //todo: отрабатывает кука на последние пять клиентов
                                    $lastClients = Yii::$app->cache->getOrSet('lastClients', function () {
                                        return \forma\modules\selling\services\SellingService::getLastClientsToHeader();
                                    });
                                    //$lastClients = \forma\modules\selling\services\SellingService::getLastClientsToHeader();
                                    foreach (\forma\modules\selling\services\SellingService::getLastClientsToHeader() as $client) {
                                        if (isset($client->customer)) {
                                            ?>
                                            <p><?= $client->customer->name ?>
                                        <?php } ?>
                                        <a href="/selling/form?id=<?= $client->id ?>">Посмотреть</a></p>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="footer">
                                <a href="/selling/main/">Перейти ко всем продажам</a>
                            </li>
                        </ul>
                    </li>

                    <!-- ВСЕ СКЛАДЫ ПОЛЬЗОВАТЕЛЯ И КОЛИЧЕСТВО ПРОДУКТОВ НА НЕМ -->
                    <li class="dropdown events-menu tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-boxes"></i>
                            <span class="label label-danger"><?= count(\forma\modules\warehouse\records\WarehouseUser::find()->where(['user_id' => Yii::$app->user->identity->id])->all()) ?></span>

                        </a>
                        <ul class="dropdown-menu" style="left: 0; padding: 5px">
                            <li class="header">Склады</li>
                            <li>
                                <!-- КЛасс меню нужен для того чтобы ограничить окно просмотра виджета, а также чтобы
                                не было удаления линии которая проходит сквозь весь таймлайн-->
                                <div class="menu">
                                    <?php
                                    $searchModelWarehouse = new WarehouseSearch();
                                    //$warehouses = $searchModelWarehouse->getWarehouseListHeader();
                                    $warehouses = Yii::$app->cache->getOrSet('warehouses', function () use ($searchModelWarehouse) {
                                        return $searchModelWarehouse->getWarehouseListHeader();
                                    });
                                    //todo: плохо работают куки, я их очищаю в браузере он мне все равно гонит склады главного юзера.

                                    foreach ($searchModelWarehouse->getWarehouseListHeader() as $warehouse) {
                                        ?>


                                        <?php $sum = 0;
                                        foreach ($warehouse->warehouseProducts as $products) {
                                            $sum += $products->quantity;
                                        } ?>
                                        <p>
                                            <a href="/warehouse/warehouse/view?id=<?= $warehouse->id ?>"><?= $warehouse->name ?></a>: <?= $sum ?>
                                            продуктов</p>
                                    <?php }
                                    ?>
                                </div>
                            </li>
                            <li class="footer">
                                <a href="/warehouse/warehouse/">Перейти ко всем складам</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="hidden-xs"><?= Yii::$app->user->getIdentity()->username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="https://st03.kakprosto.ru/tumb/680/images/article/2011/9/16/1_52552c35c5b0852552c35c5b46.png"
                                     class="img-circle"
                                     alt="User Image"/>

                                <p>
                                    <?= Yii::$app->user->getIdentity()->username ?>
                                    <small><?= Yii::$app->user->getIdentity()->role ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <!--<div class="pull-left">
                                  <a href="#" class="btn btn-default btn-flat">Профиль</a>
                                </div>-->
                                <div class="pull-right">
                                    <?= Html::a(
                                        'Выйти из системы',
                                        ['/logout'],
                                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    ) ?>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
                <div style="clear: both;"></div>
            </div>

            <div style="float: left;">
                <?= Breadcrumbs::widget([
                    'tag' => 'ul',
                    'homeLink' => isset($this->params['homeLink']) ? $this->params['homeLink'] : ['label' => 'Панель управления', 'url' => Yii::$app->homeUrl, 'title' => 'Первая страница'],
                    'options' => ['class' => 'breadcrumb', 'style' => 'margin: 5px 0 0 0; display:inline-block; background: #D0D0D0; width: 100%; border-radius: 0;'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>

        </nav>
    </header>

    <?php
//$salesProgress = new SalesProgress();
    $salesProgress = Yii::$app->cache->getOrSet('salesProgress', function () {
        return new SalesProgress();
    });
    ?>
    <script>
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };


        function getId(index) {
            return [<?=$salesProgress->getComaListOfSales()?>][index];
        }

        // planHeader.onclick = function(evt){
        //     alert(evt())
        //     console.log('нажали на воронку продаж');
        //     var activePoints = myLineChart1.getElementsAtEvent(evt);
        //     console.log(activePoints);
        //     window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index)) ;
        // };
    </script>

    <?php
    if ($this->title !== null) : ?>

        <h1 align="right" style="text-align: right; padding-right: 5px;">
            <?= \yii\helpers\Html::encode($this->title);
            echo "   "; ?>


            <span style="float: right; text-align: right; padding-left: 5px;">

        <?php

        if (empty($this->params['doc-page'])) {

            echo \forma\components\widgets\ModalSrc::widget([
                'route' => '/core/site/doc?page=layout',
                'name' => 'О проекте',
                'icon' => 'info',
                'color' => 'green',
                'options' => [
                    'style' => ['border' => '1px solid green'],
                    'id' => 'info2',
                ]
            ]);

            $js = <<<JS
          $(document).ready(function() {
              var i = setInterval(function () {
                  setTimeout(function() {
                      $('#info2').css('color', '#00f');
                  }, 250);
                  $('#info2').css('color', 'green');
              }, 500);
              
              setTimeout(function() {
                clearInterval(i);
                $('#info2').css('color', 'blue');
                setInterval(function () {
                  setTimeout(function() {
                      $('#info2').css('color', '#f00');
                  }, 1000);
                  $('#info2').css('color', 'green');
              }, 2000);
              }, 5000);
          })
JS;
            $this->registerJs($js);
        }
        ?>


        <?php if (!empty($this->params['doc-page'])) : ?>

            <?= \forma\components\widgets\ModalSrc::widget([
                'route' => '/core/site/doc?page=' . $this->params['doc-page'],
                'name' => 'О разделе',
                'icon' => 'info-circle',
                'btn' => 'primary',
            ]) ?>

        <?php endif ?>

    </span>

        </h1>


        <?php if (!empty($this->params['panel'])) : ?>
            <div style="text-align: right;">
                <?= $this->params['panel'] ?>
            </div>
        <?php endif ?>

    <?php endif ?>
<?php } ?>

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
        border-bottom: 16px solid #5055c6;
        border-left: 16px solid #c2875b;
        opacity:0.5;
        filter:alpha(opacity=70);
        -moz-opacity:0.7;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
    $(document).ready(function() {

        hideLoader();

        console.log('ready');
        $("a:not(.no-loader), input[type=submit]").click(function(event){
            if ($(this).attr('href') == '#') return;
            if ($(this).attr('href')[0] == '#') return;
            showLoader();
        });
    });

    function showLoader() {
        document.getElementById("loader").style.display = "block";
        $('body').css('pointer-events', 'none');
    }

    function hideLoader() {
        document.getElementById("loader").style.display = "none";
        $('body').css('pointer-events', 'all');
    }Добавил анимацию лоадера на все страницы при переходе по ссылкам и при отправке
</script>