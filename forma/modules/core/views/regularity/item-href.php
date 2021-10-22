<?php

use forma\modules\core\components\LinkHelper;
use kartik\dialog\Dialog;

if (is_null($item->picture)) {
    $item->picture = 'false';
}

$parentItemStr = isset($parentItem) ? $parentItem->title . '<br>' : '' . '<br>';

$dataName = '<h2>' .'<i style=\' margin-right: 30px; \' class=\'fa fa-' . $regularity->icon . ' \'></i> ' . $regularity->name . '</h2>';

if (isset($parentItem)) {
    $dataName = $dataName . '<h3 class=\'h-text\'>' . $parentItem->title . '</h3>' . '<h4 class=\'h-text\'>' . $item->title . '</h4>';
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
        <label class="container-label" style="border: 1px solid #3c8dbc; border-radius: 15px; margin-right: 5px; margin-left: 2px; display: inline-block;">
            <input type="radio" class="check-radio" name=<?= $radioName ?> id="<?= $item->id ?>">
            <span class="checkmark"></span>
            <?php
          $countRightAnswer = 0;
            $countAnswer = 0;
            if(!empty($rules = \forma\modules\core\records\Rule::find()->where(['item_id'=>$item->id]))){
                foreach ($rules->all() as $rule){
                    $countAnswer++;
                    foreach ($rule->accessInterfaces as $accessInterface){
                        if($rule->count_action == $accessInterface->current_mark){
                            $countRightAnswer++;
                        }
                    }
                }
            }

            ?>
            <label style="font-size: 15px; margin-right: 10px; float: left"> <?= $item->title ?> </label>
        </label>

        <div class="hidden-description" data-id="<?= $item->id ?>" style="visibility: hidden; display: none;">
            <?= $item->description;
           if (!empty($rules = \forma\modules\core\records\Rule::find()->where(['item_id'=>$item->id])->all())){
               $countMark = \forma\modules\core\records\AccessInterface::find()->sum('current_mark');
               echo '<hr>';
               echo 'Правила <br>';
               foreach($rules as $rule){
                   echo "
                   Операция : $rule->action над таблицей $rule->table,
                   количество : $rule->count_action <br>" ;
               }
               echo "Общее количество = $countMark";
           }

            ?>
        </div>
    </a>
</div>

<?php echo Dialog::widget();

$js = <<< JS
if($countAnswer == $countRightAnswer && $countAnswer!=0){
    $("#btn-alert"+$item->id).on("click", function() {
    krajeeDialog.alert("Вы выполнили это задание!")
    let el = document.getElementById('li'+$item->id);
            if(el===null){
                let value = `<i id='li`+$item->id+`' class='fa fa-plus fa-xs' style='float: right; margin-right: 10px'></i>`;
                $('#'+$item->id).after(value);
            }
            
});
    let el = document.getElementById('li'+$item->id);
            if(el===null){
                let value = `<i id='li`+$item->id+`' class='fa fa-plus fa-xs' style='float: right; margin-right: 10px'></i>`;
                $('#'+$item->id).after(value);
            }
}

JS;
$this->registerJs($js);


?>

