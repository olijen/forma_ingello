 <?php

use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

?>
<div class="content-wrapper" style="">
    <div class="container-fluid">
        <section class="content">
            <?= $content ?>
        </section>
    </div>
</div>

<div class='control-sidebar-bg'></div>

<?php if (Yii::$app->controller->action->id !== 'regularity'): ?>
    <div align="center">
        <a style="color: white; margin: 4px;" class="btn btn-success" target="_blank"
           href="https://ingello.com/site/contact"><i class="fa fa-dollar"></i> Начать планирование проекта</a>
    </div>
<?php endif; ?>

<?= Modal::widget([
    'id' => 'modal',

    'header' => '<p>FORMA . INGELLO 2021</p>',
]) ?>

<style>
    .treeview-menu {
        top: 40px !important;
    }

    .treeview a span {
        left: 45px !important;
    }
</style>
