<?php

use forma\modules\core\components\LinkHelper;
use forma\modules\core\records\ItemInterface;
use kartik\dialog\Dialog;
use yii\bootstrap\Collapse;
$countRuleQuestion = 0;
$countAnswerUserAnswer = 0;
foreach ($rulesData as $ruleData){
    if($ruleData->item_id == $item->id){
        $countRuleQuestion++;
        foreach ($userData as $userDatum){
            if($userDatum->rule_id == $ruleData->id && $userDatum->status ==1){
                $countAnswerUserAnswer++;
            }
        }
    }
}
$countRegularityItem=0; $countRightRegularityItem =0;
foreach ($regularity->items as $regularityItem) {
    foreach ($rulesData as $rulesDatum){

        if($rulesDatum->item_id == $regularityItem->id){
            $countRegularityItem++;
            foreach ($userData as $userDatum){
                if($userDatum->rule_id == $rulesDatum->id && $userDatum->status ==1){
                    $countRightRegularityItem++;
                }
            }
        }
    }


}
if (is_null($item->picture)) {
    $item->picture = 'false';
}

$parentItemStr = isset($parentItem) ? $parentItem->title . '<br>' : '' . '<br>';

$dataName = "<h2> <i style=' margin-right: 30px;' class='fa fa-'$regularity->icon'></i> $regularity->name 
".(($countRegularityItem >0 && $countRegularityItem<=$countRightRegularityItem)?"<i style='color:green;padding-left: 10px;
' class='fa fa-check-circle'></i>":"")."</h2>";

if (isset($parentItem)) {
    $dataName = $dataName . '<h3 id=\'item-title' . $item->id . ' class=\'h-text\'>' . $parentItem->title .
        '</h3>' . '<h4 class=\'h-text\'>' . $item->title . '</h4>';
} else {
    $dataName = $dataName . "<h3 id='item-title$item->id' class='h-text'>$item->title 
".(($countRuleQuestion >0 && $countRuleQuestion<=$countAnswerUserAnswer)?"<i style='color:green;padding-left: 10px;
' class='fa fa-check-circle'></i>":"")."</h3>";
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
            <input type="radio" class="check-radio" name=<?= $radioName ?> id="<?= $item->id ?>">
            <span class="checkmark"></span>
            <label style="font-size: 15px; margin-right: 10px; float: left">
                 <?= $item->title?> <?= (($countRuleQuestion >0 && $countRuleQuestion<=$countAnswerUserAnswer)?
                     "<i style='color:green' class='fa fa-check-circle'></i>":"")?></label>
        </label>

        <div class="hidden-description" data-id="<?= $item->id ?>" style="visibility: hidden; display: none;">
            <?= $item->description;

            if (!empty($rulesData)) {

                $isEmptyElement = array_search($item->id, array_column($rulesData, 'item_id'));

                if ($isEmptyElement!=false || $isEmptyElement===0) {
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
                                                " . (($sum >= 100) ? "<i style='color:green;padding-left: 10px;' class='fa fa-check-circle'></i>" :
                                                                "<i style='color:red;padding-left: 10px;' class='fa fa-times'></i>") . "</small>
                                            </div>
                                            <div class='progress xs'>
                                                <div class='progress-bar progress-bar-green' style='" . "width:$sum%;" . (($sum >= 100) ? "background-color:green"
                                                                : "background-color:red;") . "' ></div>
                                            </div>";

                                }

                            }

                            /*if(!empty($rule->accessInterface == null)){
                                echo "<div class='clearfix'>

                                                <small class='pull-right'>0 % (0 из 0)

                                        <i style='color:red;padding-left: 10px;' class='fa fa-times'></i>" . "</small>
                                            </div>
                                            <div class='progress xs'>
                                                <div class='progress-bar progress-bar-green' style='" . "width:0%;" .
                                    "background-color:red;" . "' ></div>
                                            </div>";
                            }*/
                        }

                    }

                    /*$array =array();
                    foreach ($rulesData as $key => $rule) {
                        if ($rule->item_id == $item->id) {
                            foreach ($rule->itemRule as $itemRule) {
                                $array[] = $itemRule->itemInterface->name_item;

                            }


                        }
                    }
                    $array = array_unique($array);
                    if(count($array)>=1){
                        echo "<p>После выполнения заданий у Вас будет доступ:</p>";
                        foreach ($array as $element){
                            echo "<p>$element</p>";
                        }
                    }*/

                    echo " </div>";
                }

            }
            ?>
        </div>

    </a>

</div>

<?php

/*$js = <<< JS

function addIconItemTab(itemId) {
            let url = '/core/rule/check-right-answer';
            $.ajax({
                url:url,
                type:"POST",
                data:{itemId: itemId},
                dataType:"json",
                success: postCallback,
            });
        };

        let postCallback = function(response) {
            if (response.result === true) {
                addNewElement(response[0].id);

            }
        };
        let addNewElement = function (id){
            let el = document.getElementById('btn-alert'+id);
                let value = `<h3 style='top: 120px; color: green;' class='h-text'><span style='background: white;padding-left: 20px;'>В этом разделе все задания выполнены <i style='margin-left: 20px;margin-right: 20px;' class='fa fa-thumbs-up'></i></span></h3>`;

                if(el.dataset.name.indexOf(value) !== -1){
                    el.dataset.name=el.dataset.name;
                }else {
                    el.dataset.name = el.dataset.name.concat(value);
                }

        }
       $("a.change-item").click(function () {
           addIconItemTab(this.id.substr(9,this.id.length));
       });


JS;

$this->registerJs($js);*/

?>
