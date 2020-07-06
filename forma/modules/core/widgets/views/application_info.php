<?php
use yii\helpers\Url;
?>


<div class="col-lg-3 col-xs-12">

    <div class="box box-success">
        <div class="box-header with-border">

            <h3 class="box-title" id="scroll">
                Отделы компании <span style="padding-left: 10px; color:#abc">
              <i class="fa fa-object-group"></i>
            </span>
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>

        </div>

        <div class="box-body">
            <div class="">

                <div class="col-lg-12 col-xs-6">

                    <?= \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_BLUE,
                        'title' => $completeSellingsCount,
                        'text' => '<h4>Отдел продаж</h4>',
                        'icon' => 'fa fa-arrows-alt',
                        'footer' => '<b style="color: white;">ПЕРЕЙТИ В СИСТЕМУ</b>',
                        'link' => Url::to(['/selling']),
                    ]); ?>

                </div>

                <div class="col-lg-12 col-xs-6">

                    <?= \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_YELLOW,
                        'title' => $productsCount,
                        'text' => '<h4>Складской учет</h4>',
                        'icon' => 'fa fa-cube',
                        'footer' => '<b style="color: white;">ПЕРЕЙТИ В СИСТЕМУ</b>',
                        'link' => Url::to(['/product/product']),
                    ]); ?>

                </div>

                <div class="col-lg-12 col-xs-6">
                    <a href="">

                    </a>
                    <?= \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_RED,
                        'title' => 113,
                        'text' => '<h4>Отдел кадров</h4>',
                        'icon' => 'fa fa-users',
                        'footer' => '<b style="color: white;">ПЕРЕЙТИ В СИСТЕМУ</b>',
                        'link' => Url::to(['/hr']),
                    ]); ?>

                </div>

            </div>
        </div>

    </div>

</div>