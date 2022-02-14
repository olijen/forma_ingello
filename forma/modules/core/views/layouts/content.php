 <?php

 use forma\components\widgets\ModalCreate;
 use forma\modules\core\records\AccessInterface;
 use forma\modules\core\records\Item;
 use forma\modules\core\records\ItemQuery;
 use forma\modules\core\records\Regularity;
 use forma\modules\core\records\RegularityQuery;
 use forma\modules\core\records\Rule;
 use forma\modules\core\services\RegularityGameService;
 use yii\bootstrap\Alert;
 use yii\bootstrap\Modal;
 use yii\helpers\Url;
 use yii\widgets\Breadcrumbs;

 Alert::begin([
     'options' => [
         'class' => 'alert-warning',
         'id' => 'alert-id',
         'style' => 'display: none'
     ],
 ]);
     echo "<p id='alert-rule'></p>";
 Alert::end();
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
    'headerOptions' => ['id' => 'modalHeader'],
]) ?>

<style>
    .treeview-menu {
        top: 40px !important;
    }

    .treeview a span {
        left: 43px !important;
    }
</style>

