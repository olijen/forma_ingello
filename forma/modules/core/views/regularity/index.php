<?php

use yii\helpers\Url;
use kartik\color\ColorInput;

$this->title = 'Регламент, правила';

function show($url, $text = "Открыть", $with = 600, $height = 600, $left = 600)
{
    if ($url{0} == '/') {
        if (false === strripos($url, '?')) {
            $url .= '?';
        } else {
            $url .= '&';
        }
        $url .= 'without-header';
    }
    if ($url{0} == '/') {
        echo \forma\components\widgets\ModalSrc::widget([
            'route' => $url,
            'name' => $text,
            'icon' => 'eye',
            'color' => 'blue',
            'iframe' => true,
            'options' => [
                'class' => 'btn btn-primary btn-xs',
                'style' => ['border' => '1px solid green'],
                'id' => 'id' . time(),
            ]
        ]);
        return;
    }
    ?>
    <a onclick="window.open('<?= $url ?>', 'Window', 'width=600,height=600,left=600')"
       class="btn btn-primary btn-xs ">
        <?= $text ?>
    </a>
    <?php
}

$regularitys = $dataProvider->getModels();
?>

<?php
function replaceUrl($text)
{
    $text = str_ireplace("{{", "<?php show(\"", $text);
    $text = str_ireplace("||", "\", \"", $text);
    $text = str_ireplace("}}", "\") ?>", $text);
    echo $text;
}

?>

<?php
function replaceUrlIngello($text)
{
    if (strripos($text, "{{/")) {
        $text = str_ireplace("{{", "<a  style=\"color: blue;\"  class=\"btn btn-outline-secondary\" type=\"button\" data-toggle=\"modal\" data-target=\"#modal\" onclick=\"$('#modal .modal-dialog .modal-content .modal-body').html(''); $('<iframe src=", $text);
        $text = str_ireplace("||", " style=width:100%;height:500px frameborder=0 id=myFrame></iframe>').appendTo('#modal .modal-dialog .modal-content .modal-body');\"> <i class=\"fa fa-eye\"></i>", $text);
        $text = str_ireplace("}}", "</a>", $text);
        echo $text;
    } else {
        $text = str_ireplace("{{", "<a onclick=\"window.open(' ", $text);
        $text = str_ireplace("||", " ', 'Window', 'width=600,height=600,left=600')\" class=\"btn btn-primary btn-xs\">", $text);
        $text = str_ireplace("}}", "</a>", $text);
        echo $text;
    }

}

?>

<?php
function replaceUrl1($text)
{
    $text = str_ireplace("{{", "<a style=\"color: blue;\" onclick=\"window.open(' ", $text);
    $text = str_ireplace("||", " ', 'Window', 'width=600,height=600,left=600')\" class=\"btn btn-outline-secondary\"><i class=\"fa fa-eye\"></i>", $text);
    $text = str_ireplace("}}", "</a>", $text);

    echo $text;
}
?>




<section class="content">
    <?php if($regularitys):?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <?php foreach ($regularitys as $regularity): ?>
                <li class="<?= $regularity['order'] == 1 ? 'active' : '' ?> ">
                    <a href="#tab_<?= $regularity['order'] ?>" data-toggle="tab"><?= $regularity['name'] ?></a>
                </li>
            <?php endforeach; ?>
            <a href="/core/regularity/settings"><i class="fa fa-cog"></i></a>
        </ul>

        <div class="tab-content">

            <?php foreach ($regularitys as $regularity):?>
                <div class="tab-pane <?= $regularity['order'] == 1 ? 'active' : '' ?>"
                     id="tab_<?= $regularity['order'] ?>">

                    <?php foreach ($regularity->items as $item) {
                        if ($item['parent_id'] != null) {
                            $data[] = $item;
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">

                                <div class="box-header with-border">
                                    <h4 class="box-title"><i class="fa fa-phone"></i> Этот раздел поможет интегрировать
                                        систему FORMA с
                                        любой компанией</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">

                                        <?php foreach ($regularity->items as $item): ?>
                                            <?php if (is_null($item['parent_id'])): ?>
                                                <div class="panel box box-success"
                                                     style="margin-bottom: 5px; border-top-color: <?= $item['color'] ?>">
                                                    <div class="box-header with-border" style="margin-bottom: 5px">
                                                        <h4 class="box-title">

                                                            <a href="/core/item/update?id=<?= $item['id'] ?>"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>&parent_id=<?= $item['id'] ?>"><i
                                                                    class="fa fa-plus"></i></a>
                                                            <a href="/core/item/delet?id=<?= $item['id'] ?>"><i
                                                                    class="fa fa-trash"></i></a>

                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse_<?= $item['id'] ?>" class="collapsed"
                                                               aria-expanded="false">
                                                                <?= $item['title']; ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse_<?= $item['id'] ?>"
                                                         class="panel-collapse collapse"
                                                         aria-expanded="false" style="height: 0px;">
                                                        <div class="box-body">
                                                            <?php replaceUrlIngello($item['description']); ?>

                                                            <!-- /.box-header -->
                                                            <div class="box-body">
                                                                <div class="box-group" id="accordion1">
                                                                    <?php if ($data):?>
                                                                    <?php foreach ($data as $value): ?>
                                                                        <?php if ($value['parent_id'] == $item['id']): ?>
                                                                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                                                            <div class="panel box box-primary"
                                                                                 style="margin-bottom: 5px; border-top-color: <?= $value['color'] ?>">
                                                                                <div class="box-header with-border" style="margin-bottom: 5px">
                                                                                    <h4 class="box-title">
                                                                                        <a href="/core/item/update?id=<?= $value['id'] ?>">
                                                                                            <i class="fa fa-edit"></i></a>
                                                                                        <a href="/core/item/delet?id=<?= $value['id'] ?>">
                                                                                            <i class="fa fa-trash"></i></a>

                                                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                                                           href="#capse_<?= $value['id'] ?>"
                                                                                           class="collapsed"
                                                                                           aria-expanded="false">
                                                                                            <?= $value['title']; ?>
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="capse_<?= $value['id'] ?>"
                                                                                     class="panel-collapse collapse"
                                                                                     aria-expanded="false"
                                                                                     style="height: 0px;">
                                                                                    <div class="box-body">
                                                                                        <?php replaceUrlIngello($value['description']); ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>

                    <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>"><i class="fa fa-plus"></i>Добавить
                        пункт</a>
                </div>
            <?php endforeach; ?>
            <!-- /.tab-pane -->

            <!-- /.tab-pane -->
        </div>
    </div>
<?php elseif(!$regularitys): ?>

    <h4>У вас нет регламентов, но вы можете их добавить пройдя по ссылке <br><br>
        <a href="/core/regularity/settings">Добавить регламент</a> </h4>

<?php endif;?>
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
    ['label' => 'Командная работа', 'url' => 'http://applan.ingello.com', 'icon' => 'sitemap'],
    ['label' => 'Интернет магазин', 'url' => 'http://ecocom.ingello.com', 'icon' => 'money'],
];

foreach ($menu as $itemMain): ?>

    <h2>
        <?= !empty($itemMain['icon']) ? '<i class="fa fa-' . $itemMain['icon'] . '"></i>' : '' ?>
        <?= !empty($itemMain['url']) ? '<a href="' . Url::to($itemMain['url']) . '">' : '' ?>
        <?= $itemMain['label'] ?>
        <?= !empty($itemMain['url']) ? '</a>' : '' ?>
    </h2>

    <?php if (!empty($itemMain['items'])) : $i = 0;
        foreach ($itemMain['items'] as $item): ?>

            <?php if ($i % 3 == 0): ?>
                <div class="row">
            <?php endif; ?>

            <div class="col-md-4">
                <a href="<?= Url::to($item['url']) ?>">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-<?= $item['icon'] ?>"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><?= $item['label'] ?></span>
                        </div>
                    </div>
                </a>
            </div>

            <?php $i++;
            if ($i % 3 == 0 || $i == count($itemMain['items'])): ?>
                </div>
            <?php endif; ?>

        <?php endforeach; endif; ?>

<?php endforeach; ?>
