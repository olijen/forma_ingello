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

<header class="main-header">

    <?= Html::a('
        <span class="logo-mini">F.I</span>
        <span class="logo-lg">' . Yii::$app->name . '</span>', '#', ['class' => 'logo', 'data-toggle' => "push-menu", 'role' => "button"]) ?>


  <meta name="theme-color" content="#00a65a">

  <nav style="position: fixed; box-shadow: 0 0 10px rgba(0,0,0,0.5); top: 0;" class="navbar navbar-static-top" role="navigation">

    <a href="#" data-toggle="push-menu" style="color: white; float: left; background-color: transparent; background-image: none;  padding: 15px 15px;  font-family: fontAwesome;" class="logo-mini"><i class="fa fa-bars" aria-hidden="true"></i></a>

    <a href="#" title="Вернуться назад" style="color: white; float: left; background-color: transparent; background-image: none;  padding: 15px 15px;  font-family: fontAwesome;" onclick="window.history.back()">
      <i class="fa fa-arrow-left"></i></a>
    <a href="#" id="fs" title="На весь экран" style="color: white; float: left; background-color: transparent; background-image: none;  padding: 15px 15px;  font-family: fontAwesome;">
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
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-comment"></i>
            <span class="label label-success">4</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Новых сообщений: 4</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="/product">
                    <div class="pull-left">
                      <img src="<?= $directoryAsset ?>/img/user1-128x128.jpg" class="img-circle" alt="Иконка пользователя"/>
                    </div>
                    <h4>
                      Бизнес-аналитик
                      <small><i class="fa fa-clock-o"></i> 1 мин</small>
                    </h4>
                    <p>Посетите раздел объектов</p>
                  </a>
                </li>
                <li>
                  <a href="/warehouse/warehouse">
                    <div class="pull-left">
                      <img src="<?= $directoryAsset ?>/img/user6-128x128.jpg" class="img-circle" alt="Иконка пользователя"/>
                    </div>
                    <h4>
                      Кладовщик
                      <small><i class="fa fa-clock-o"></i> 1 мин</small>
                    </h4>
                    <p>Перейдите в панель хранилищ</p>
                  </a>
                </li>
                <li>
                  <a href="/selling/main">
                    <div class="pull-left">
                      <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle" alt="Иконка пользователя"/>
                    </div>
                    <h4>
                      Менеджер по продажам
                      <small><i class="fa fa-clock-o"></i> 1 мин</small>
                    </h4>
                    <p>Начните управлять клиентами</p>
                  </a>
                </li>
                <li>
                  <a href="http://fractal.ingello.com">
                    <div class="pull-left">
                      <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                           alt="user image"/>
                    </div>
                    <h4>
                      Команда SYSTEMS.I
                      <small><i class="fa fa-clock-o"></i> 1 мин</small>
                    </h4>
                    <p>Вы можете заказать персональную систему для Вашей компании на базе FRACTAL.I Кликните для подробностей.</p>
                  </a>
                </li>
                <li>
                  <a href="http://business.ingello.com">
                    <div class="pull-left">
                      <img src="<?= $directoryAsset ?>/img/user5-128x128.jpg" class="img-circle"
                           alt="user image"/>
                    </div>
                    <h4>
                      Общество BUSINESS.I
                      <small><i class="fa fa-clock-o"></i> 1 мин</small>
                    </h4>
                    <p>Интересуетесь бизнесом и технологиями? Любите читать или писать статьи об этом? Есть идеи или советы? Посетите наше сообщество BUSINESS.I</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#"> Смотреть все сообщения</a></li>
          </ul>
        </li>
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">У Вас 10 уведомлений</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 новых пользователей
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-yellow"></i> 13 непрочитанных сообщений
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 1 пользователь удалился
                  </a>
                </li>

                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 сделок завершено
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> Вы зарегистрировались в системе
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">Смотреть все</a></li>
          </ul>
        </li>
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-tasks"></i>
            <span class="label label-danger">9</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">У Вас 9 задач</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <h3>
                      Начать проектирование
                      <small class="pull-right">5%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 5%"
                           role="progressbar" aria-valuenow="20" aria-valuemin="0"
                           aria-valuemax="100">
                        <span class="sr-only">0% Готово</span>
                      </div>
                    </div>
                  </a>
                </li><li>
                  <a href="#">
                    <h3>
                      Утвердить бюджет и сроки
                      <small class="pull-right">30%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 30%"
                           role="progressbar" aria-valuenow="20" aria-valuemin="0"
                           aria-valuemax="100">
                        <span class="sr-only">30% Готово</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h3>
                      Утвердить ТЗ
                      <small class="pull-right">60%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-red" style="width: 60%"
                           role="progressbar" aria-valuenow="20" aria-valuemin="0"
                           aria-valuemax="100">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h3>
                      Определиться с исполнителями
                      <small class="pull-right">99%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 99%"
                           role="progressbar" aria-valuenow="20" aria-valuemin="0"
                           aria-valuemax="100">
                        <span class="sr-only">99% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer">
              <a href="#">Смотреть все задачи</a>
            </li>
          </ul>
        </li>

        <!--  СОБЫТИЯ -->
        <li class="dropdown events-menu tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-car"></i>
                  <span class="label label-danger">20</span>
              </a>
              <ul class="dropdown-menu" style="width: 400px">
                  <li class="header">20 последних событий</li>
                  <li>
                      <!-- КЛасс меню нужен для того чтобы ограничить окно просмотра виджета, а также чтобы
                      не было удаления линии которая проходит сквозь весь таймлайн-->
                      <div class="menu">
                          <?php
                          $searchModelHeader = new SystemEventSearch();
                          $dataProviderHeader = $searchModelHeader->search(Yii::$app->request->queryParams);
                          ?>
                          <ul class="timeline" >
                              <?php

                              $eventDate = "";
                              $icon = "";
                              foreach ($dataProviderHeader->models as $model) {
                                  foreach(Yii::$app->params['icons'] as $kIcon => $vIcon){
                                      if($model->class_name == $kIcon){
                                          $icon = $vIcon;
                                      }
                                  }
                                  $color = "";
                                  foreach(Yii::$app->params['colors'] as $app => $colorValue) {
                                      if($model->application == $app) $color = $colorValue;
                                  }
                                  $arr = [];
                                  $linkView = "";
                                  $event = "";
                                  if(strlen($model->request_uri) > 0 && $model->sender_id != 1) {
                                      $arr = explode("/", $model->request_uri);
                                      $linkView = "/" . $arr[1] . "/" . $arr[2];
                                      if(count($arr) > 3)$event = substr($arr[3], 0, 6);
                                  }
                                  if($eventDate != substr($model->date_time, 0, 10)){
                                      ?>

                                      <!-- timeline time label -->
                                      <li class="time-label">
        <span class="bg-red">
            <?=substr($model->date_time, 0, 10)?>
        </span>
                                      </li>
                                  <?php }?>
                                  <!-- /.timeline-label -->

                                  <!-- timeline item -->
                                  <li>
                                      <!-- timeline icon -->
                                      <i class="fa fa-<?=$icon!=""? $icon : 'envelope'?>" style="background-color: <?=$color?>; color: #fff"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> <?=substr($model->date_time, 11, 5)?></span>

                                          <h3 class="timeline-header">В отделе <a href="#"><?=$model->application?></a> произошло событие</h3>
                                          <div class="timeline-body">
                                              <?=$model->data?>
                                          </div>
                                          <?php
                                          //todo: пока что не выводим
                                          if($model->sender_id !=1 && false) { ?>
                                              <div class="timeline-footer">
                                                  <p>Посмотреть список в модуле: <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."||" .$model->class_name."}}")) ?></p>

                                                  <p><?php if($event != "delete"){?>Посмотреть на объект: <?php LinkHelper::replaceUrlOnButton(" {{".Url::to($linkView."/update?id=".$model->sender_id."||" .$model->class_name."}}")) ?><?php }?></p>
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
                  <i class="fa fa-car"></i>

              </a>
              <ul class="dropdown-menu">
                  <li class="header">Продажи</li>
                  <li>
                      <!-- КЛасс меню нужен для того чтобы ограничить окно просмотра виджета, а также чтобы
                      не было удаления линии которая проходит сквозь весь таймлайн-->
                      <div class="menu">
                          <div class="chart">
                              <canvas id="planHeader" style=""></canvas>
                          </div>
                          <?php
                            $lastClients = \forma\modules\selling\services\SellingService::getLastClientsToHeader();
                            foreach($lastClients as $client){?>
                                <p><?=$client->customer->name?>
                                <a href="/selling/form?id=<?=$client->id?>">Посмотреть</a></p>
                           <?php } ?>
                          ?>
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
                  <i class="fa fa-car"></i>

              </a>
              <ul class="dropdown-menu">
                  <li class="header">Склады</li>
                  <li>
                      <!-- КЛасс меню нужен для того чтобы ограничить окно просмотра виджета, а также чтобы
                      не было удаления линии которая проходит сквозь весь таймлайн-->
                      <div class="menu">
                        <?php
                            $searchModelWarehouse = new WarehouseSearch();
                            $warehouses = $searchModelWarehouse->getWarehouseListHeader();
                            foreach($warehouses as $warehouse){?>


                         <?php $sum = 0;  foreach($warehouse->warehouseProducts as $products){
                             $sum += $products->quantity;
                                }?>
                                <p><a href="/warehouse/warehouse/view?id=<?=$warehouse->id?>"><?=$warehouse->name?></a>: <?=$sum?> продуктов</p>
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
              <img src="https://st03.kakprosto.ru/tumb/680/images/article/2011/9/16/1_52552c35c5b0852552c35c5b46.png" class="img-circle"
                   alt="User Image"/>

              <p>
                  <?= Yii::$app->user->getIdentity()->username ?>
                <small><?= Yii::$app->user->getIdentity()->role ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Профиль</a>
              </div>
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
            'homeLink' =>  isset($this->params['homeLink']) ? $this->params['homeLink'] : [ 'label' => 'Панель управления', 'url' => Yii::$app->homeUrl, 'title' => 'Первая страница'],
            'options' => [ 'class' => 'breadcrumb', 'style'=>'margin: 5px 0 0 0; display:inline-block; background: #D0D0D0; width: 101%; border-radius: 0;'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>

  </nav>
</header>

<?php
$salesProgress = new SalesProgress();
?>
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

    myLineChart1 = new Chart(document.getElementById("planHeader").getContext('2d'), {
        type: 'bar',
        data: {
            labels: [<?=$salesProgress->getLabelsString()?>],

            datasets: [{
                label: 'Количество продаж',
                data: [<?=$salesProgress->getDataString()?>],
                backgroundColor: [<?=$salesProgress->getColorsString()?>],
            }]
        },
        options: options
    });


    function getId(index) {
        return [<?=$salesProgress->getComaListOfSales()?>][index];
    }

    planHeader.onclick = function(evt){
        console.log('нажали на воронку продаж');
        var activePoints = myLineChart1.getElementsAtEvent(evt);
        console.log(activePoints);
        window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index)) ;
    };
</script>

<?php
if ($this->title !== null) : ?>

  <h1 align="right" style="text-align: right; padding-right: 5px;">
      <?= \yii\helpers\Html::encode($this->title); echo "   "; ?>


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

            <?=\forma\components\widgets\ModalSrc::widget([
                'route' => '/core/site/doc?page='.$this->params['doc-page'],
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

$bgColor = '#00b65d';
$bgColorPrimary = '#58628e';
$color = '';

if ('selling' == Yii::$app->controller->module->id) {
    $bgColor = '#58628e';
    $bgColorPrimary = '#100873';
    $color = 'white';
} elseif ('product' == Yii::$app->controller->module->id) {
    $bgColor = '#f49258';
    $bgColorPrimary = '#399F85';
} elseif ('hr' == Yii::$app->controller->module->id) {
    $bgColor = '#F08080';
    $bgColorPrimary = '#66C066';
    $color = 'black';
} elseif ('project' == Yii::$app->controller->module->id) {
    $bgColor = '#58628e';
    $bgColorPrimary = '#D0B676';
} elseif ('worker' == Yii::$app->controller->module->id) {
    $bgColor = '#F08080';
} elseif ('vacancy' == Yii::$app->controller->module->id) {
    $bgColor = '#F08080';
} elseif ('country' == Yii::$app->controller->module->id) {
    $bgColor = '#f49258';
} elseif ('warehouse' == Yii::$app->controller->module->id) {
    $bgColor = '#f49258';
} elseif ('purchase' == Yii::$app->controller->module->id) {
    $bgColor = '#f49258';
} elseif ('transit' == Yii::$app->controller->module->id) {
    $bgColor = '#f49258';
}
?>

<style>


  .info-box, .box, .form-control, .redactor-box,
  .navbar, .navbar-static-top, .main-sidebar, .btn, .select2-selection {
    box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22) !important;
    border-radius: 0 !important;
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
  .btn-success:hover,
  .logo-mini,
  .logo,
  .bg-green {
    background-color: <?php echo $bgColor ?> !important;
  }
  .btn-primary {
    background-color: <?php echo $bgColorPrimary ?> !important;
  }
  .bg-blue{
    background-color: #58628e !important;
  }
  .bg-yellow{
    background-color: #f49258 !important;
  }
  .bg-red{
    background-color: #F08080 !important;
  }

  <?php if ('selling'!= Yii::$app->controller->module->id && 'core' != Yii::$app->controller->module->id) : ?>
  .box-success {
    border-color: <?php echo $bgColor ?> !important;
  }
  <?php endif ?>

  .table-striped > tbody > tr:nth-of-type(even):hover,
  .table-striped > tbody > tr:nth-of-type(odd):hover{
    background-color: <?php echo $bgColor ?> !important;
    color: <?php echo $color?> !important;
  }

  /* scroll */

  ::-webkit-scrollbar {
    width:7px;
  }
  ::-webkit-scrollbar-thumb {
    border-width:3px 3px 3px 2px;
    border-color: <?php echo $bgColor ?>;
    background-color: <?php echo $bgColor ?>;
  }

  ::-webkit-scrollbar-thumb:hover {
    border-width: 1px 1px 1px 2px;
    border-color: <?php echo $bgColorPrimary ?>;
    background-color: <?php echo $bgColorPrimary ?>;
  }]
  ::-webkit-scrollbar-track {
    border-width:0;
  }
  ::-webkit-scrollbar-track:hover {
    border-left: solid 1px <?php echo $bgColor ?>;
    background-color: <?php echo $bgColor ?>;
  }
</style>