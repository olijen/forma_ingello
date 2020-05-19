<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var Array $models models from tables equal modelsClassName */
/* @var $form yii\widgets\ActiveForm */
/* @var Array $subscribes current subscribes models */
?>
<?php
    var_dump($subscribes);
    ActiveForm::begin([
        'action' => ['save-subscribe'],
        'method' => 'get',
    ]);
?>

<ul>
    <?php
    $separator = intval(count($models) / 4);
    $count = $separator;
    foreach ($models as $keyModel) {
            if($count == $separator) {
                echo "<h2>НОВЫЙ РАЗДЕЛ</h2>";
                $count = 0;
            }
            echo '<li>'.$keyModel;
    ?>
        <p>События:</p>
        Создание: <input type="checkbox" name="EventForSubscribe[<?=$keyModel?>][create]" value="1"
            <?php foreach($subscribes as $k => $v) {
                    if ($subscribes[$k]->object_name == $keyModel && $subscribes[$k]->create == 1) echo "checked";
                } ?>
        >
        Обновление: <input type="checkbox" name="EventForSubscribe[<?=$keyModel?>][update]" value="1"
            <?php foreach($subscribes as $k => $v) {
                if ($subscribes[$k]->object_name == $keyModel && $subscribes[$k]->update == 1) echo "checked";
            }  ?>
        >
        Удаление: <input type="checkbox" name="EventForSubscribe[<?=$keyModel?>][delete]" value="1"
            <?php foreach($subscribes as $k => $v) {
                if ($subscribes[$k]->object_name == $keyModel && $subscribes[$k]->delete == 1) echo "checked";
            }  ?>
        >
    <?php
            echo "</li>";
            $count++;
        }
    ?>

    <?= Html::submitButton('Сохранить подписку', ['class' => 'btn btn-danger']) ?>
    <?php ActiveForm::end(); ?>

</ul>
