 <?php

use forma\components\widgets\ModalCreate;
 use yii\bootstrap\Alert;
 use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
 $cookies = Yii::$app->request->cookies;
?>
<div class="content-wrapper" style="">
    <div class="container-fluid">
        <?php if (($cookie = $cookies->get('event')) !== null):
            Alert::begin([
                'options' => [
                    'class' => 'alert-warning',
                ],
            ]);
            $value = "";
            $rule = \forma\modules\core\records\Rule::find()->where(['id' => $cookie->value])->one();
            $value = 'Действие ' . $rule->action . ' над таблицей ' . $rule->table . ', количество операций ' . $rule->count_action . ', пройдено! <br/>';
            echo $value;
            Alert::end();
            Yii::$app->response->cookies->remove('event');
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

    'header' => '<p>FORMA . INGELLO 2021</p> ',
]) ?>

<style>
    .treeview-menu {
        top: 40px !important;
    }

    .treeview a span {
        left: 45px !important;
    }
</style>
 <!--<script>
     var newElement = document.getElementById("newBtn");
     if (newElement != null) {
         newElement.remove();
     }
     newElement = document.createElement("div");
     newElement.setAttribute("id", "newBtn");
     newElement.style.cssText ="position:relative; top:-25px; right:10px";
     newElement.innerHTML= `<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>`;
     var findElementCreateRequest = document.querySelector('.modal-header');
     findElementCreateRequest.append(newElement);
     var ele = document.querySelector('.modal-dialog');
     var eleBody = document.querySelector('.modal-body');
     eleBody.style.height ="80%";
     ele.style.height = "90vh";
     $("#newBtn").click(function () {
         if(ele.style.height == "90vh") {
             ele.style.height = "45vh";
         }
         else {
             ele.style.height = "90vh";
         }
     });
 </script>-->
