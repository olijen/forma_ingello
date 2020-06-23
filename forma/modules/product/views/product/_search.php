<?php

use forma\modules\product\components\SystemWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'category_id')->hiddenInput()->label(false)?>
    <div class="col-md-4">
        <?= $form->field($model, 'id') ?>
        <?= $form->field($model, 'sku') ?>
        <?= $form->field($model, 'name') ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'manufacturer_id')->dropDownList(
            \forma\modules\product\records\Manufacturer::getList(),
            ['prompt' => '']
        ) ?>
        <?= $form->field($model, 'rating') ?>
    </div>

    <?php
    if (!empty($fieldValues)) {
        foreach ($fieldValues as $fieldId => $fieldValue) {
            $i = 0;

            if ($i%3 == 0 || $i == 0 ){
                echo '<div class="col-md-4">';
            }
            echo SystemWidget::getByName($fieldId, $fieldValue, true);
            echo '</br>';

            if ($i%3 == 0){
                echo '</div>';
            }
            $i++;
        }
    }
    ?>

    <div class="form-group col-md-12">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
