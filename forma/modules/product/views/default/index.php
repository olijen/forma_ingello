<?php
$this->title = 'Объекты';
$this->params['doc-page'] = 'object';

$list = [
    ['label' => 'Объекты учета', 'url' => '/product/product', 'icon' => 'cube',
    
    ],
    ['label' => 'Категории', 'url' => '/product/category', 'icon' => 'object-group',
    
    ],
    ['label' => 'Упаковки', 'url' => '/product/pack-unit', 'icon' => 'cubes',
    
    ],
    ['label' => 'Страны', 'url' => '/country/country', 'icon' => 'podcast',
    
    ],
    ['label' => 'Валюты', 'url' => '/product/currency', 'icon' => 'money-bill-alt',
    
    ],
    ['label' => 'Налоги', 'url' => '/product/tax-rate', 'icon' => 'balance-scale',
    
    ],
];

?>

<div class="row">
    <?php foreach ($list as $k => $item): ?>
    <a href="<?=$item['url']?>">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">

                <span class="info-box-icon bg-green"><i class="fa fa-<?=$item['icon']?>"></i></span>

                <div class="info-box-content">

                        <span class="info-box-text"><?=$item['label']?></span>

                    <span class="info-box-number"><?=rand(100, 10000)?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </a>
    <?php endforeach ?>
</div>
