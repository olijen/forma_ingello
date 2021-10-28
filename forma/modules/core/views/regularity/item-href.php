<?php

use forma\modules\core\components\LinkHelper;
use kartik\dialog\Dialog;
use yii\bootstrap\Collapse;

if (is_null($item->picture)) {
    $item->picture = 'false';
}

$parentItemStr = isset($parentItem) ? $parentItem->title . '<br>' : '' . '<br>';

$dataName = '<h2>' .'<i style=\' margin-right: 30px; \' class=\'fa fa-' . $regularity->icon . ' \'></i> ' . $regularity->name . '</h2>';

if (isset($parentItem)) {
    $dataName = $dataName . '<h3 id=\'item-title'.$item->id.' class=\'h-text\'>' . $parentItem->title . '</h3>' . '<h4 class=\'h-text\'>' . $item->title . '</h4>';
} else {
    $dataName = $dataName . "<h3 id='item-title$item->id' class='h-text'>$item->title </h3>";
}
$countRightAnswer = 0;
$countAnswer = 0;

$rules = \forma\modules\core\records\Rule::find()->where(['item_id'=>$item->id])->all();
$accessInterfaceUser = \forma\modules\core\records\AccessInterface::find()->where(['user_id'=>Yii::$app->user->id])->all();
if(!empty($rules)){
    foreach ($rules as $rule){
        $countAnswer++;
        foreach ($rule->accessInterfaces as $accessInterface){
            if($rule->count_action == $accessInterface->current_mark){
                $countRightAnswer++;
            }
        }
    }
}
if($countAnswer == $countRightAnswer && $countAnswer!=0){
    $dataName = $dataName. "<h3 style='top: 120px; color: green;' class='h-text'><span style='background: white;padding-left: 20px;'>В этом разделе все задания выполнены <i style='margin-left: 20px;margin-right: 20px;' class='fa fa-thumbs-up'></i></span></h3>";
};
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
        <label class="container-label" style="border: 1px solid #3c8dbc; border-radius: 15px; margin-right: 5px; margin-left: 2px; display: inline-block;">
            <input type="radio" class="check-radio" name=<?= $radioName ?> id="<?= $item->id ?>">
            <span class="checkmark"></span>
            <label style="font-size: 15px; margin-right: 10px; float: left"> <?= $item->title ?> </label>
        </label>

        <div class="hidden-description" data-id="<?= $item->id ?>" style="visibility: hidden; display: none;">
            <?= $item->description;
            if (!empty($rules)) {
                echo "<div class='box-header with-border big_widget_header'>
                            <h3 class='box-title'><i class='fas fa-bullseye'></i> Выполнение задач</h3>
                        </div>";
                echo "<div class='box-body' style='border:2px solid #00a65a;'>";

                foreach ($rules as $key=>$rule){
                    $key++;

                    foreach ($accessInterfaceUser as $item){

                        if($item->rule_id == $rule->id){
                            $sum = ($item->current_mark/$rule->count_action)*100;
                            echo "<div class='clearfix'>
                            <span class='pull-left'>#$key $rule->rule_name</span>
                            <small class='pull-right'>$sum % ($item->current_mark из $rule->count_action)</small>
                        </div>
                        <div class='progress xs'>
                            <div class='progress-bar progress-bar-green' style='width: $sum%;'></div>
                        </div>";
                        }
                    }
                }
                echo " </div>";
            }
            ?>
        </div>

    </a>

</div>

<?php

$js = <<< JS

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

$this->registerJs($js);

?>
