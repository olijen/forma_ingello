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
         'id' => 'alert-rule',
         'style' => 'display: none'
     ],
 ]);
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

    @media all and (max-width: 480px) {
        .btn-all-screen {
            width: 100%;
        }

        .btn-half-screen {
            width: 49.2%;
        }
    }
</style>

<script>
    $(document).ready(function () {
        setTimeout(function go() {
            reloadContainerPublicRegularity();
            setTimeout(go, 1000);
        }, 1000);

        function reloadContainerPublicRegularity() {
            let ruleId = getCookie('ruleId');

            if (ruleId != null) {
                let documenByItem = window.parent;

                $.ajax({
                    type: "POST",
                    url: "/core/regularity/get-item-id-by-rule",
                    data: {ruleKey: ruleId}
                }).done(function (itemId) {
                    let alertElement = $('#alert-rule');
                    alertElement.append(itemId.value);
                    alertElement.attr('style', 'position: fixed; z-index: 100; width: 60%; margin-left: 60px; bottom: 0;')

                    Cookies.remove('ruleId');

                    documenByItem.$.pjax.reload({
                        container: '#regularity-check-icon-' + itemId.regularityId,
                        async: false
                    });
                    documenByItem.$.pjax.reload({container: '#box-item-rules-' + ruleId, async: false});
                    documenByItem.$.pjax.reload({container: '#item-check-icon-' + itemId.itemId, async: false});

                    documenByItem.$('#item-check-icon-' + itemId.itemId).trigger('click');
                });
            }
        }
    });
</script>