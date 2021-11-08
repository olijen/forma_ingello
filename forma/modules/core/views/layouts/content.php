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

            $value = "#Задание: ".(($rule->action ==='insert')?'Вставить':'')
                                .(($rule->action ==='update')?'Обновить':'').(($rule->action ==='delete')?'Удалить':'')." данные из(для): 
                                ".Yii::$app->params['translateTablesName'][$rule->table].", $rule->count_action зап. Ты справился!!!";
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

