<?php

use forma\modules\warehouse\services\WarehouseService;
use yii\helpers\Url;
use yii\helpers\Html;

use keygenqt\autocompleteAjax\AutocompleteAjax;
use forma\modules\product\records\Product;

?>

<aside class="main-sidebar" style="position: fixed; box-shadow: 0 0 10px rgba(0,0,0,0.5); top: -50px;">

    <section class="sidebar">

        <!-- search form -->
        <form id="live-search" action="/product/product" method="get" class="sidebar-form">
            <input id="searching-product-id" type="hidden" value="">

            <!-- todo: Вынести -->
            <script>
                $('#live-search').submit(function(event) {
                    event.preventDefault();

                    var searchingProductId = $('#searching-product-id').val();

                    if (searchingProductId !== '') {
                        var url = '<?= Url::to(['/product/product']) ?>' + '?';
                        url += encodeURIComponent('ProductSearch[id]');
                        url += '=';
                        url += searchingProductId;

                        $(location).attr('href', url);
                    }
                });

            </script>

            <div class="input-group">

                <?= AutocompleteAjax::widget([
                    'url' => [Url::toRoute(['/product/product/search'])],
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Поиск...',
                        'style' => 'z-index: 1000000;',
                    ],
                    'model' => new Product,
                    'attribute' => 'name',

                    // todo: Хорошо протестировать всегда ли есть ui.item.id
                    // todo: Выдает ошибку Unknown Property – yii\base\UnknownPropertyException
                    // todo: Setting unknown property: keygenqt\autocompleteAjax\AutocompleteAjax::afterSelect
//                    'afterSelect' => 'function(event, ui) {
//                        $("#searching-product-id").val(ui.item.id);
//                    }',
                ]); ?>

              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <style>
            .treeview-menu {
                z-index: 9999;
            }
        </style>
        
        <?php

        $warehouses = [
            [
                'label' => 'Смотреть все',
                'url' => ['/warehouse/warehouse'],
                'icon' => 'th'
            ],

            ['label' => 'Инвентаризация', 'url' => ['/inventorization/main'], 'icon' => 'money'],
            ['label' => 'Поставки', 'url' => ['/purchase/main'], 'icon' => 'download'],
            ['label' => 'Перемещения', 'url' => ['/transit/main'], 'icon' => 'retweet'],

            [
                'label' => 'Список хранилищ',
                'url' => '#',
                'icon' => 'square',
                'items' => [
                ]
            ],

        ];

        foreach (WarehouseService::getAll() as $warehouse)  {
            $warehouses[1]['items'][] = [
                'label' => $warehouse->name,
                'url' => ['/warehouse/warehouse/view?id='.$warehouse->id],
                'icon' => 'square'
            ];
        }


        Yii::$app->params['menu'] = [
          ['label' => 'Статистика', 'url' => ['/'], 'icon' => 'line-chart'],

          ['label' => 'Регламент', 'url' => ['/core/regularity'], 'icon' => 'tree' ],
          [
              'label' => 'Люди',
              'url' => ['/core/default/people'],
              'icon' => 'users',
              'items' => [
                  ['label' => 'Панель управления', 'url' => ['/core/default/people'], 'icon' => 'laptop'],
                  ['label' => 'Клиенты', 'url' => ['/customer/customer'], 'icon' => 'user-circle'],
                  ['label' => 'Кадры', 'url' => ['/worker/worker'], 'icon' => 'user'],
                  ['label' => 'Поставщики', 'url' => ['/supplier/supplier'], 'icon' => 'truck'],
                  ['label' => 'Производители', 'url' => ['/product/manufacturer'], 'icon' => 'id-card'],
                  ['label' => 'Пациенты', 'url' => 'http://dent.ingello.com', 'icon' => 'heartbeat'],
                  ['label' => 'Регистрация', 'url' => ['/core/site/signup'], 'icon' => 'globe'],
                  ['label' => 'Пользователи', 'url' => ['/core/user/referral'], 'icon' => 'book'],
              ]
          ],
          [
              'label' => 'Продажи (CRM)',
              'url' => ['/selling/default'],
              'icon' => 'money',
              'items' => [
                  [
                      'label' => 'Панель управления',
                      'url' => ['/selling/default'],
                      'icon' => 'laptop',
                      'items' => [

                      ]
                  ], [
                      'label' => 'Продажи клиентам',
                      'url' => ['/selling/main'],
                      'icon' => 'money',
                      'items' => [

                      ]
                  ],[
                      'label' => 'Скрипты',
                      'url' => ['/selling/speech-module'],
                      'icon' => 'list',
                      'items' => [

                      ]
                  ],
                  ['label' => 'Генерация лидов FLH', 'url' => '/selling/freelancehunt/', 'icon' => 'users'],
                  ['label' => 'Скрипты для FLH', 'url' => '/selling/freelancehunt/bid-form', 'icon' => 'dollar'],
              ]
          ],
          [
              'label' => 'Найм и проекты',
              'url' => '/hr/',
              'icon' => 'user-plus',
              'items' => [
                  ['label' => 'Панель управления', 'url' => ['/hr/'], 'icon' => 'laptop'],
                  ['label' => 'Проекты', 'url' => ['/project/project?ProjectSearch[state]=1'], 'icon' => 'newspaper-o'],
                  ['label' => 'Найм', 'url' => ['/hr/main'], 'icon' => 'volume-up'],
                  ['label' => 'Кадры', 'url' => ['/worker/worker'], 'icon' => 'user'],
                  ['label' => 'Вакансии', 'url' => ['/vacancy/vacancy'], 'icon' => 'id-card'],
                  ['label' => 'Регистрация', 'url' => ['/core/site/signup'], 'icon' => 'globe'],
                  ['label' => 'Пользователи', 'url' => ['/core/user/referral'], 'icon' => 'book'],
              ],
          ],
          [
              'label' => 'Продукты и услуги',
              'url' => '/product/default/',
              'icon' => 'cube',
              'items' => [
                  ['label' => 'Панель управления', 'url' => ['/product/'], 'icon' => 'laptop'],
                  ['label' => 'Продукты и услуги', 'url' => ['/product/product'], 'icon' => 'cube'],
                  ['label' => 'Категории', 'url' => ['/product/category'], 'icon' => 'object-group'],
                  ['label' => 'Упаковки', 'url' => ['/product/pack-unit'], 'icon' => 'cubes'],
                  ['label' => 'Страны', 'url' => ['/country/country'], 'icon' => 'podcast'],
                  ['label' => 'Валюты', 'url' => ['/product/currency'], 'icon' => 'money-bill-alt'],
                  ['label' => 'Налоги', 'url' => ['/product/tax-rate'], 'icon' => 'balance-scale'],
              ],
          ],
          [
              'label' => 'Хранилища',
              'url' => ['/warehouse/warehouse'],
              'icon' => 'th',
              'items' => $warehouses,
          ],
          ['label' => 'Командная работа', 'url' => 'http://applan.ingello.com', 'icon' => 'sitemap'],
          ['label' => 'Интернет магазин', 'url' => 'http://ecocom.ingello.com', 'icon' => 'money'],
      ];

        ?>


        <?= \forma\modules\core\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => Yii::$app->params['menu'],
            ]
        ) ?>

    </section>

</aside>
