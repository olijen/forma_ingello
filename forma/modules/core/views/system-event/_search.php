<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\SystemEventSearch */
/* @var $form yii\widgets\ActiveForm */

$applications = ['' => 'Все отделы'];
$modules = ['' => 'Все модули'];

foreach(json_decode(Yii::$app->params['main'], true) as $app_name => $app_value){
    $applications[$app_name] = $app_name;
    foreach($app_value as $mod_name => $mod_value){
        $modules[$mod_name] = $mod_name;
    }
}
?>

<div class="system-event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>



    <?= $form->field($model, 'date_time')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'application')->dropDownList($applications) ?>

    <?= $form->field($model, 'module')->dropDownList($modules) ?>


    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-event']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-event']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
