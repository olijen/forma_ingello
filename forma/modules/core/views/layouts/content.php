<?php

use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

?>
<div class="content-wrapper" style="">
    <div class="container-fluid">
        <section class="content-header">
            <div>

            </div>

        </section>

        <section class="content">
            <?= $content ?>
        </section>
    </div>
</div>

<div class='control-sidebar-bg'></div>

<div align="center">
  <a style="color: white; margin: 4px;" class="btn btn-success" target="_blank" href="http://ingello.com/site/contact"><i class="fa fa-phone"></i> Заказать бесплатную консультацию по телефону</a>
</div>

<?= Modal::widget([
    'id' => 'modal',
    'toggleButton' => false,
    'header' => 'FORMA . INGELLO 2020 - закажи индивидуальную систему',
]) ?>

<style>
    .treeview-menu {
        top: 40px !important;
    }

    .treeview a span {
        left: 45px !important;
    }
</style>
