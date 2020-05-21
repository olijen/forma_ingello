<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var Array $models models from tables equal modelsClassName */
/* @var $form yii\widgets\ActiveForm */
/* @var Array $subscribes current subscribes models */
?>
<?php
    ActiveForm::begin([
        'action' => ['save-subscribe'],
        'method' => 'get',
    ]);
?>



<?php
    $apps = Yii::$app->params['applications'];
    foreach($apps as $app_name => $app_value) {
        echo "<h2> $app_name </h2>";
        foreach ($app_value as $mod_name => $mod_value) {
            echo "<h3>$mod_name</h3>";
            foreach ($mod_value as $obj_name) {
                echo "<p>$obj_name</p>";
                ?>
                <p>События:</p>
                Создание: <input type="checkbox" name="EventForSubscribe[<?=$obj_name?>][create]" value="1"
                    <?php foreach($subscribes as $k => $v) {
                        if ($subscribes[$k]->object_name == $obj_name && $subscribes[$k]->create == 1) echo "checked";
                    } ?>
                >
                Обновление: <input type="checkbox" name="EventForSubscribe[<?=$obj_name?>][update]" value="1"
                    <?php foreach($subscribes as $k => $v) {
                        if ($subscribes[$k]->object_name == $obj_name && $subscribes[$k]->update == 1) echo "checked";
                    }  ?>
                >
                Удаление: <input type="checkbox" name="EventForSubscribe[<?=$obj_name?>][delete]" value="1"
                    <?php foreach($subscribes as $k => $v) {
                        if ($subscribes[$k]->object_name == $obj_name && $subscribes[$k]->delete == 1) echo "checked";
                    }  ?>
                >
                Кастомное событие: <input type="checkbox" name="EventForSubscribe[<?=$obj_name?>][custom]" value="1"
                    <?php foreach($subscribes as $k => $v) {
                        if ($subscribes[$k]->object_name == $obj_name && $subscribes[$k]->custom == 1) echo "checked";
                    }  ?>
                >
                <?php
            }
        }
    }
?>



    <?= Html::submitButton('Сохранить подписку', ['class' => 'btn btn-danger']) ?>

<?php ActiveForm::end(); ?>