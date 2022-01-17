 <?php

use forma\components\widgets\ModalCreate;
 use yii\bootstrap\Alert;
 use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use \yii\web\JsExpression;
 $cookies = Yii::$app->request->cookies;
?>
 <style>
     .hover-info:hover{
         color: #ffee10;
         box-shadow: 0 0 5px #ffee10;
         text-shadow: 0 0 5px #ffee10;
     }
     .hover-info:hover::before{
         transform: scale(1.1);
         box-shadow: 0 0 15px #ffee10;
     }
     .hover-info:before{
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         border-radius: 50%;
         background: #ffee10;
         transition: .5s;
         transform: scale(.9);
         z-index: -1;
     }
     .hover-info{
         cursor: help;
         position: relative;
         display: block;
         width: 60px;
         height: 60px;
         text-align: center;
         line-height: 63px;
         background: rgb(0, 9, 255);
         border-radius: 50%;
         font-size: 30px;
         color: #ffffff;
         transition: .5s;
         margin: 5px;
     }
 </style>
<div class="content-wrapper" style="">
    <div class="container-fluid">
        <?php if (($cookie = $cookies->get('event')) !== null):
            Alert::begin([
                'options' => [
                    'class' => 'alert-warning',
                ],
            ]);
            $value = "";
            $rank = \forma\modules\core\records\Rank::find()->where(['id' => $cookie->value])->one();
            $interfaceTemp = "Вы получили доступ к таким элементам: ";
            $arrayKey = [];
            foreach ($rank->itemInterfaces as $itemInterface) {
                $allInterfaces = \Yii::$app->params['access-interface'][$itemInterface->module];
                foreach ($allInterfaces as $key => $interface) {
                    if ($key == $itemInterface->key) {
                        $interfaceTemp .= $interface . '; ';
                        $str = str_replace(' ', '-', $itemInterface->key);
                        $arrayKey [] = $str;
                    }
                }
            }
            $value = '#Задание: Ты справился ' . $interfaceTemp . '<a href="/core/user-profile">ПРОФИЛЬ</a>'.'!!!';
            echo $value;
            Alert::end();
            Yii::$app->response->cookies->remove('event');
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'array-pulsate',
                'value' => $arrayKey,

            ]));

        endif; ?>

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
        left: 45px !important;
    }
</style>

