<?php

use forma\modules\core\components\LinkHelper;
use kartik\dialog\Dialog;

if (is_null($item->picture)) {
    $item->picture = 'false';
}

$parentItemStr = isset($parentItem) ? $parentItem->title . '<br>' : '' . '<br>';

$dataName = '<h2>' .'<i style=\' margin-right: 30px; \' class=\'fa fa-' . $regularity->icon . ' \'></i> ' . $regularity->name . '</h2>';

if (isset($parentItem)) {
    $dataName = $dataName . '<h3 class=\'h-text\'>' . $parentItem->title . '</h3>' . '<h4 style=\'top: 140px;\' class=\'h-text\'>' . $item->title . '</h4>';
} else {
    $dataName = $dataName . '<h3 class=\'h-text\'>' . $item->title . '</h3>';
}

$countRightAnswer = 0;
$countAnswer = 0;
if (!empty($rules = \forma\modules\core\records\Rule::find()->where(['item_id' => $item->id]))) {
    foreach ($rules->all() as $rule) {
        $countAnswer++;
        foreach ($rule->accessInterfaces as $accessInterface) {
            if ($rule->count_action == $accessInterface->current_mark) {
                $countRightAnswer++;
            }
        }
    }
}
?>
<div class="carousel-child">
    <a id="btn-alert<?= $item->id ?>" href="#menu<?= $item->id ?>"
       data-href="menu<?= $item->id ?>"
       data-name="<?= $dataName ?>"
       data-picture="<?= $item->picture ?>"
       class="change-item"
       style="display: flex;
              flex-direction: column-reverse;"
    >
        <label class="container-label"
               style="border: 1px solid #3c8dbc; border-radius: 15px; margin-right: 5px; margin-left: 2px; display: inline-block;">

            <?php \yii\widgets\Pjax::begin(['id' => 'item-check-icon-' . $item->id, 'timeout' => false, 'options' => ['style' => 'display: inline']]) ?>
            <input type="radio" style="display: none" class="check-radio"
                   name=<?= $radioName ?> id="item-check<?= $item->id ?>">

            <?php if($countAnswer == $countRightAnswer && $countAnswer != 0){ ?>
            <i id='li`+$item->id+`' class='fa fa-check-circle' style='color: green; float: right; margin-right: 0.1px'></i>
            <?php } ?>

            <span class="checkmark"></span>

            <?php
            \yii\widgets\Pjax::end();
            ?>

            <label style="font-size: 15px; margin-right: 10px; float: left"> <?= $item->title ?> </label>
        </label>

        <div class="hidden-description" data-id="<?= $item->id ?>" style="visibility: hidden; display: none;">
            <?= $item->description;

            if (!empty($rulesData)) {

                $isEmptyElement = array_search($item->id, array_column($rulesData, 'item_id'));

                if ($isEmptyElement!=false || $isEmptyElement===0) {
                    \yii\widgets\Pjax::begin(['id' => 'box-item-rules-' . $item->id, 'timeout' => false]);

                    echo "<div class='box-header with-border big_widget_header'>
                            <h3 class='box-title' style='font-size: 25px;'>
                            <i class='fas fa-bullseye' style='color: red;'></i> Выполнение задач</h3>
                        </div>";

                    echo "<div class='box-body' style='border:2px solid #808080;'>";
                    $translateTablesName = Yii::$app->params['translateTablesName'];
                    foreach ($rulesData as $rule) {
                        if ($rule->item_id == $item->id) {
                        echo "<div class='clearfix'>
                                    <span class='pull-left'>Название задачи: ".(($rule->action ==='insert')?'добавить':'')
                                .(($rule->action ==='update')?'обновить':'').(($rule->action ==='delete')?'удалить':'').", объект 
                                '".Yii::$app->params['translateTablesName'][$rule->table]."'</span>
                               </div>";
                        foreach ($userDataIsNull as $dataNull){
                            if($dataNull->id == $rule->id){
                                echo "<div class='clearfix'>
                                                
                                                <small class='pull-right'>0 % (0 из 0)
                                                
                                        <i style='color:red;padding-left: 10px;' class='fa fa-times'></i>" . "</small>
                                            </div>
                                            <div class='progress xs'>
                                                <div class='progress-bar progress-bar-green' style='" . "width:0%;" .
                                    "background-color:red;" . "' ></div>
                                            </div>";
                            }
                        }

                            foreach ($userData as $accessInterface) {

                                if ($accessInterface->rule_id == $rule->id) {
                                    //var_dump(count($userData),'vfvfd');
                                    $sum = round(($accessInterface->current_mark / $rule->count_action) * 100);
                                    echo "<div class='clearfix'>
                                                
                                                <small class='pull-right'>$sum % ($accessInterface->current_mark из $rule->count_action)
                                                " . (($sum >= 100) ? "<i style='color:green;padding-left: 10px;' ></i>" :
                                                                "<i style='color:red;padding-left: 10px;' class='fa fa-times'></i>") . "</small>
                                            </div>
                                            <div class='progress xs'>
                                                <div class='progress-bar progress-bar-green' style='" . "width:$sum%;" . (($sum >= 100) ? "background-color:green"
                                                                : "background-color:red;") . "' ></div>
                                            </div>";

                                }

                            }
                        }

                    }

                    echo " </div>";
                    \yii\widgets\Pjax::end();
                }

            }
            ?>
        </div>

    </a>

</div>

