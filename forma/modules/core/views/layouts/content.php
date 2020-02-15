<?php

use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

?>
<div class="content-wrapper" style="margin-top: 50px;">
    <div class="container-fluid">
        <section class="content-header">
            <div>
                <?php
                if ($this->title !== null) : ?>
                    <h1 style="display: inline;"><?= \yii\helpers\Html::encode($this->title); ?></h1>
                    <span style="float: right; text-align: right;">
                    <?php if (!empty($this->params['panel'])) : ?>
                        <span style="text-align: left;">
                            <?= $this->params['panel'] ?>
                        </span>
                    <?php endif ?>
                    <?php if (!empty($this->params['doc-page'])) : ?>

                        <?=\forma\components\widgets\ModalSrc::widget([
                            'route' => '/core/site/doc?page='.$this->params['doc-page'],
                            'name' => 'О разделе',
                            'icon' => 'info-circle',
                            'btn' => 'primary',
                        ]) ?>

                    <?php endif ?>
                    </span>
                <?php endif ?>
                <div style="clear: both;"></div>
            </div>

        </section>

        <section class="content">
            <?= $content ?>
        </section>
    </div>
</div>

<div class='control-sidebar-bg'></div>
<?= Modal::widget([
    'id' => 'modal',
    'toggleButton' => false,
    'header' => 'FORMA . INGELLO 2019',
]) ?>

<style>
    .treeview-menu {
        top: 40px !important;
    }

    .treeview a span {
        left: 45px !important;
    }
</style>
