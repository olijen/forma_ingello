<?php

use yii\helpers\Url;
use kartik\color\ColorInput;
use forma\modules\core\components\LinkHelper;

$this->title = 'Регламент, правила';
Url::remember(['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]);
$publicRegularityUrl = Url::to((['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]));
?>
<a class="btn btn-success" href='<?= $publicRegularityUrl?>'
   style="position: absolute; top: 80px; right: 20px;">
    <i class="fa fa-code"></i>
</a>

<!-- Вывод регламентов и их пунктов-->
<section class="content">
    <?php if ($regularitys): ?>

        <?= $this->render('regularity', [
            'regularitys' => $regularitys,
            'items' => $items,
            'order_id'=> $order_id
        ]);
        ?>

    <?php elseif (!$regularitys): ?>
        <h4>У вас нет регламентов, но вы можете их добавить пройдя по ссылке <br><br>
            <a href="/core/regularity/settings">Добавить регламент</a>
        </h4>
    <?php endif; ?>
</section>


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
];

$menu = [
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
            ['label' => 'Пациенты', 'url' => 'https://dent.ingello.com', 'icon' => 'heartbeat'],
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
            ], [
                'label' => 'Скрипты',
                'url' => ['/selling/speech-module'],
                'icon' => 'list',
                'items' => [

                ]
            ],
            ['label' => 'Генерация лидов FLH', 'url' => '/selling/freelancehunt/', 'icon' => 'users'],
            ['label' => 'Форма ставки FLH', 'url' => '/selling/freelancehunt/bid-form', 'icon' => 'dollar'],
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
    ['label' => 'Статистика', 'url' => ['/'], 'icon' => 'line-chart'],
    ['label' => 'Регламент', 'url' => ['/core/regularity'], 'icon' => 'tree'],
    ['label' => 'Командная работа', 'url' => 'https://applan.ingello.com', 'icon' => 'sitemap'],
    ['label' => 'Интернет магазин', 'url' => 'https://ecocom.ingello.com', 'icon' => 'money'],
];

?>

<h1>Эти функции можно использовать в регламенте для прямого запуска компонентов системы</h1>

<?php

foreach ($menu as $itemMain): ?>
    <div style="padding: 5px; border:1px solid #ccc;">
        <h2>
            <?= !empty($itemMain['icon']) ? '<i class="fa fa-' . $itemMain['icon'] . '"></i>' : '' ?>
            <?= !empty($itemMain['url']) ? '<a href="' . Url::to($itemMain['url']) . '">' : '' ?>
            <?= $itemMain['label'] ?>
            <?= !empty($itemMain['url']) ? '</a>' : '' ?>

          <span class=""><?php LinkHelper::replaceUrlOnButton(" {{".Url::to($itemMain['url'])."||" .$itemMain['label']."}}") ?></span>
          <input style="font-size: 17px; width: 30%;" class="" value="{{<?= Url::to($itemMain['url']) ?>||<?= $itemMain['label'] ?>}}"/>


        </h2>

    </div>

<br>

    <?php if (!empty($itemMain['items'])) : $i = 0;
        foreach ($itemMain['items'] as $item): ?>

            <?php if ($i % 3 == 0): ?>
                <div class="row">
            <?php endif; ?>

            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-<?= $item['icon'] ?>"></i></span>
                    <div class="info-box-content">


                        <span class=""><?php LinkHelper::replaceUrlOnButton(" {{".Url::to($item['url'])."||". $item['label']."}}") ?></span>
                      <br>                      <br>
                        <input style="width:100%" class=""
                                    value="{{<?= Url::to($item['url']) ?>||<?= $item['label'] ?>}}"/>
                    </div>
                </div>
            </div>

            <?php $i++;
            if ($i % 3 == 0 || $i == count($itemMain['items'])): ?>
                </div>
            <?php endif; ?>

        <?php endforeach; endif; ?>

<?php endforeach; ?>
