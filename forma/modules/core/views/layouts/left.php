<?php

use forma\modules\warehouse\services\WarehouseService;
use yii\helpers\Url;
use yii\helpers\Html;

use keygenqt\autocompleteAjax\AutocompleteAjax;
use forma\modules\product\records\Product;
?>
<?php if (Yii::$app->user->isGuest): ?>
<aside class="main-sidebar" style="position: fixed; box-shadow: 0 0 10px rgba(0,0,0,0.5); top: -50px; visibility: hidden">
    <?php else:?>
<aside class="main-sidebar" style="position: fixed; box-shadow: 0 0 10px rgba(0,0,0,0.5); top: -50px;">
    <?php endif; ?>

    <section class="sidebar">

        <!-- search form -->
        <form id="live-search" action="/product/product" method="get" class="sidebar-form">
            <input id="searching-product-id" type="hidden" value="">

            <!-- todo: Вынести -->
            <script>
                $('#live-search').submit(function(event) {
                    event.preventDefault();

                    var searchingProductId = $('#searching-product-id').val();

                    if (searchingProductId !== '') {
                        var url = '<?= Url::to(['/product/product']) ?>' + '?';
                        url += encodeURIComponent('ProductSearch[id]');
                        url += '=';
                        url += searchingProductId;

                        $(location).attr('href', url);
                    }
                });

            </script>

            <div class="input-group">

                <?= AutocompleteAjax::widget([
                    'url' => [Url::toRoute(['/product/product/search'])],
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Поиск...',
                        'style' => 'z-index: 1000000;',
                    ],
                    'model' => new Product,
                    'attribute' => 'name',

                    // todo: Хорошо протестировать всегда ли есть ui.item.id
                    // todo: Выдает ошибку Unknown Property – yii\base\UnknownPropertyException
                    // todo: Setting unknown property: keygenqt\autocompleteAjax\AutocompleteAjax::afterSelect
//                    'afterSelect' => 'function(event, ui) {
//                        $("#searching-product-id").val(ui.item.id);
//                    }',
                ]); ?>

              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <style>
            .treeview-menu {
                z-index: 9999;
            }
        </style>

        <?= \forma\modules\core\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => Yii::$app->params['menu'],
            ]
        ) ?>

    </section>

</aside>