<?php
use yii\helpers\Url;
?>


<div class="box box-success" data-widget_name="ApplicationInfo">

        <div class="box-header with-border big_widget_header">

            <h3 class="box-title" id="scroll">
                <i class="fas fa-building"></i> Отделы компании <span style="padding-left: 10px; color:#abc">
              <i class="fa fa-object-group"></i>
            </span>
            </h3>

            <div class="box-tools pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="/selling/default"><i class="fa fa-laptop"></i>Отдел продаж</a></li>
                        <li><a href="/product"><i class="fa fa-laptop"></i>Складской учет</a></li>
                        <li><a href="/hr"><i class="fa fa-laptop"></i>Отдел кадров</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                            class="fa fa-minus"></i>
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
                        'title' => (new \forma\modules\worker\records\WorkerSearch())->search([])->getTotalCount(),
                        'text' => '<h4>Отдел кадров</h4>',
                        'icon' => 'fa fa-users',
                        'footer' => '<b style="color: white;">ПЕРЕЙТИ В СИСТЕМУ</b>',
                        'link' => Url::to(['/hr']),
                    ]); ?>

                </div>

            </div>
        </div>

    <div class="small_widget_header box-header" style="display: none">
        <h3 class="box-title" data-toggle="tooltip" data-placement="top" title="Отделы компании"> <i class="fas fa-building"></i> </h3>
    </div>

</div>