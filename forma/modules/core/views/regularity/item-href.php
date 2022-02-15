<?php

use forma\modules\core\components\LinkHelper;
use forma\modules\core\records\ItemInterface;
use forma\modules\core\records\Rank;
use forma\modules\core\records\Rule;
use kartik\dialog\Dialog;
use rmrevin\yii\fontawesome\FontAwesome;
use yii\bootstrap\Collapse;

$allDataRegularity = new \forma\modules\core\services\RegularityGameService($regularity->id);

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

            <?php
                if ($allDataRegularity->isCompletedRulesByItemId($item->id) !== false) {
                    echo "<i id='li`+$item->id+`' class='fa fa-check-circle' style='color: green; float: right; margin-right: 0.1px'></i>";
                }
            ?>

            <span class="checkmark"></span>

            <?php
            \yii\widgets\Pjax::end();
            ?>

            <label style="font-size: 15px; margin-right: 10px; float: left">
                <?= $item->title ?></label>
        </label>


        <div class="hidden-description" data-id="<?= $item->id ?>" style="visibility: hidden; display: none;">
            <?= $item->description;

            if (!empty($allDataRegularity)) {

                if ($allDataRegularity->isItemById($item->id)) {
                    echo "<div class='box-header with-border big_widget_header'>
                            <h3 class='box-title' style='font-size: 25px;'>
                            <i class='fas fa-bullseye' style='color: red;'></i> Выполнение задач</h3>
                        </div>";

                    echo "<div class='box-body' style='border:2px solid #808080;'>";
                    $translateTablesName = Yii::$app->params['translateTablesName'];
                    foreach ($allDataRegularity->getItems() as $tempItem) {
                        if ($tempItem["id"] == $item->id) {
                            foreach ($allDataRegularity->getRules() as $rule) {
                                \yii\widgets\Pjax::begin(['id' => 'box-item-rules-' . $rule['id'], 'timeout' => false]);
                                if ($rule['item_id'] == $item->id) {
                                    $iconName = "";
                                    $icons = array_slice((new \ReflectionClass(FontAwesome::class))->getConstants(), 21, -1);;
                                    foreach ($icons as $key => $icon) {
                                        if ($key == $rule['icon']) {
                                            $iconName = $icon;
                                            break;
                                        }

                                    }
                                    echo "<div class='clearfix'>
                                            <span class='pull-left'><i class='fa fa-$iconName' style='margin-right: 5px;'></i>Задание: " . (($rule["action"] === 'insert') ? 'добавить' : '')
                                        . (($rule["action"] === 'update') ? 'обновить' : '') . (($rule["action"] === 'delete') ? 'удалить' : '') . " 
                                        '" . Yii::$app->params['translateTablesName'][$rule["table"]] . "'</span>
                                         </div>";
                                    $tempCurrentBall = 0;
                                    foreach ($allDataRegularity->getUserProfileRules() as $userProfileRule) {
                                        if ($userProfileRule['rule_id'] == $rule['id']) {
                                            $tempCurrentBall++;
                                        }
                                    }

                                    if ($tempCurrentBall == 0) {
                                        echo "<div class='clearfix'>
                                                
                                                <small class='pull-right'>0 % (0 из " . $rule["count_action"] . ")
                                                
                                        <i style='color:red;padding-left: 10px;' class='fa fa-times'></i>" . "</small>
                                            </div>
                                            <div class='progress xs'>
                                                <div class='progress-bar progress-bar-green' style='" . "width:0%;" .
                                            "background-color:red;" . "' ></div>
                                                
                                            </div>";
                                    } else {
                                        $sum = round(($tempCurrentBall / $rule["count_action"]) * 100);
                                        echo "<div class='clearfix'>
                                                
                                                <small class='pull-right'>$sum % ($tempCurrentBall из " . $rule["count_action"] . ")
                                                " . (($sum >= 100) ? "<i style='color:green;padding-left: 10px;' class='fa fa-check-circle'></i>" :
                                                "<i style='color:red;padding-left: 10px;' class='fa fa-times'></i>") . "</small>
                                            </div>
                                            <div class='progress xs'>
                                                <div class='progress-bar progress-bar-green' style='" . "width:$sum%;" . (($sum >= 100) ? "background-color:green"
                                                : "background-color:red;") . "' ></div>
                                            </div>";
                                    }
                                }
                                \yii\widgets\Pjax::end();
                            }
                            echo "<h1>Награды за выполненные задания:</h1>";
                            foreach ($allDataRegularity->getGrantInterfaceByRankId($allDataRegularity->getRankIdByItemId($tempItem['id'])) as $interface) {
                                echo "<br />$interface <br />";
                            }
                        }

                    }
                    echo " </div>";
                }

            }
            ?>
        </div>



    </a>

</div>
