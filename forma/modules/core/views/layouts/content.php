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

 $cookies = Yii::$app->request->cookies;
?>
<div class="content-wrapper" style="">
    <div class="container-fluid">
        <?php if (($cookie = $cookies->get('event')) !== null) {
            Alert::begin([
                'options' => [
                    'class' => 'alert-warning',
                ],
            ]);
            $value = "";
            $rule = Rule::find()->where(['id' => $cookie->value])->one();
            $value = "#Задание: " . (($rule->action === 'insert') ? 'Вставить' : '')
                . (($rule->action === 'update') ? 'Обновить' : '') . (($rule->action === 'delete') ? 'Удалить' : '') . " данные из(для): 
                     " . Yii::$app->params['translateTablesName'][$rule->table] . ", $rule->count_action зап. Ты справился!!!";
            echo $value;

            echo "<script>
                      let documenByItem = window.parent;
                      let liItem = documenByItem.document.getElementById('li$rule->item_id')
                       if(liItem === null){
                           let createItemIcon = document.createElement('i');
                           createItemIcon.setAttribute('id', 'li{$rule->item_id}');
                           createItemIcon.setAttribute('class', 'fa fa-check-circle');
                           createItemIcon.setAttribute('style', 'color: green; float: right; margin-right: 0.1px');
                           if (documenByItem) {
                               let findItemAfterInsert = documenByItem.document.getElementById('item-check'+{$rule->item_id});
                               findItemAfterInsert.after(createItemIcon);
                           }
                       }
                 </script>";
            if ((new RegularityGameService($rule->id))->isAllRightItemByRegularity() === true) {
                echo "<script>
                          let documenByRegylrity = window.parent;
                          let liRegylarity = documenByRegylrity.document.getElementById('li-regylarity$rule->item_id')
                          if (liRegylarity === null) {
                              let createRegylarityIcon = document.createElement('i');
                              createRegylarityIcon.setAttribute('id', 'li-regylarit{$rule->item->regularity_id}');
                              createRegylarityIcon.setAttribute('class', 'fa fa-check-circle');
                              createRegylarityIcon.setAttribute('style', 'float: right; color:green;padding-left: 10px');
                              
                              if (documenByRegylrity) {
                                  let findRegylarityAfterInsert = documenByRegylrity.document.getElementById('regularity-check'+{$rule->item->regularity_id});
                                  findRegylarityAfterInsert.after(createRegylarityIcon);
                              }  
                          }
                      </script>";
            }
            Yii::$app->response->cookies->remove('event');
            Alert::end();
        } ?>
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

