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



<?php if (!Yii::$app->user->isGuest) { ?>
    <header class="main-header">

        <?= Html::a('
        <span class="logo-mini">F.I</span>
        <span class="logo-lg">' . Yii::$app->name . '</span>', '#', ['class' => 'logo', 'data-toggle' => "push-menu", 'role' => "button"]) ?>

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

                        <a      id="info"
                                style="color: #fff;"
                                href="/core/regularity/regularity"
                                class="btn btn-outline-secondary"
                                type="button"
                        >

                            <i class="fa fa-tree" style="font-size: 18px;"></i>

                        </a>
                        <?php

                        //todo: тут повсеместная кнопка документации
                        if (false && empty($this->params['doc-page'])) {

                            echo \forma\components\widgets\ModalSrc::widget([
                                'route' => '/core/site/doc?page=layout',
                                'name' => '',
                                'icon' => 'info',
                                'color' => 'white',
                                'class' => 'no-loader',
                                'options' => [
                                    'id' => 'info',
                                    'class' => 'no-loader'
                                ]
                            ]);

                            $js = <<<JS
                        $(document).ready(function() {
                            $('#info').addClass("no-loader");
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
//                                    $warehouses = Yii::$app->cache->getOrSet('warehouses', function () use ($searchModelWarehouse) {
//                                        return $searchModelWarehouse->getWarehouseListHeader();
//                                    });
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

        if (false && !empty($this->params['doc-page'])) {

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


        <?php //todo: тут повсеместная кнопка документации
        if (false && !empty($this->params['doc-page'])) : ?>

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

