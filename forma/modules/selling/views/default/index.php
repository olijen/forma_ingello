<?php
$this->title = 'Продажи';
$this->params['doc-page'] = 'Selling';

$list = [
    ['label' => 'Продажи', 'url' => '/selling/main', 'icon' => 'balance-scale',

    ],
    ['label' => 'Речевые модули', 'url' => '/selling/speech-module', 'icon' => 'podcast',

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
