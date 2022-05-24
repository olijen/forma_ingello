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


<?php
//#f49258
$bgColor = '#00a65a';
if ('selling'== Yii::$app->controller->module->id){
    $bgColor ='#58628e';
}elseif ('hr' == Yii::$app->controller->module->id){
    $bgColor = '#F08080';
}elseif ('product' == Yii::$app->controller->module->id){
    $bgColor = '#f49258';
}elseif ('warehouse' == Yii::$app->controller->module->id){
    $bgColor ='#f49258';
}elseif ('country' == Yii::$app->controller->module->id){
    $bgColor ='#f49258';
}elseif ('customer' == Yii::$app->controller->module->id){
    $bgColor ='#58628e';
}elseif ('worker' == Yii::$app->controller->module->id){
    $bgColor ='#F08080';
}elseif ('vacancy' == Yii::$app->controller->module->id){
    $bgColor ='#F08080';
}elseif ('inventorization' == Yii::$app->controller->module->id){
    $bgColor ='#f49258';
}elseif ('purchase' == Yii::$app->controller->module->id){
    $bgColor ='#f49258';
}elseif ('transit' == Yii::$app->controller->module->id){
    $bgColor ='#f49258';
}
?>
            <style>
                .menuColor > a > *{
                    color: white;
                }
                li.menuColor.text_black > a >  * {
                    color: #0a0a0a;
                }
                .menuColor:hover >a >*{
                    color: #0a0a0a;
                }
                .skin-green-light .sidebar-menu>li.active>a{
                    border-top: dashed 2px black;
                    border-bottom: dashed 2px black;
                    color: white;
                    background-color: <?php echo $bgColor?>;
                }

                .menuColor.active > a > * {
                    color: white;
                }

                /*}*/
                .treeview-menu {
                    z-index: 9999;
                }

                .treeview.menu-open>ul.treeview-menu {
                    overflow: hidden;
                }

            </style>

            <?php if ((Yii::$app->params['menu'][1]['items'][2]['url'][0] === '/core/regularity/regularity')) {
                Yii::$app->params['menu'][1]['items'][2]['url'][0] = Url::to((['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]));
            }?>
            <?= \forma\modules\core\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => Yii::$app->params['menu'],
                ]
            ) ?>

        </section>

    </aside>

    <script>
        function resizeSmallWidget(append) {
            $('.container-small_widgets').css('width', $('.container-small_widgets').width() + eval(append) + 'px');
        }

        $('#menu-head').click(function () {
            if ($('#body1').hasClass('sidebar-collapse')) {
                $('li.menuColor.treeview').css('overflow-y', 'scroll');
                $('li.menuColor.treeview').css('max-height', '400px');

                if (window.screen.width <= 1024) {
                    $('.main-sidebar').css('overflow-y', 'scroll');
                    $('.main-sidebar').css('max-height', '150px');
                }

                resizeSmallWidget('- 229 + 55');
            } else {
                $('li.menuColor.treeview').css('overflow-y', '')
                $('li.menuColor.treeview').css('max-height', '')

                $('.main-sidebar').css('overflow-y', '');
                $('.main-sidebar').css('max-height', '');

                resizeSmallWidget('+ 229 - 55');
            }

            if (window.screen.width <= 1024) {
                if (!$('#body1').hasClass('sidebar-open') || $('#body1').hasClass('sidebar-collapse')) {
                    $('li.menuColor.treeview').css('overflow-y', 'scroll');
                    $('li.menuColor.treeview').css('max-height', '400px');

                    $('.main-sidebar').css('overflow-y', 'scroll');
                    $('.main-sidebar').css('max-height', '150px');
                } else {
                    $('li.menuColor.treeview').css('overflow-y', '')
                    $('li.menuColor.treeview').css('max-height', '')

                    $('.main-sidebar').css('overflow-y', '');
                    $('.main-sidebar').css('max-height', '');
                }
            }
        })
    </script>
