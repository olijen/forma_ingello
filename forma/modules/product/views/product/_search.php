<?php
//echo '<pre>';
//var_dump($fieldAttributes);
//echo '</pre>';

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

    <div class="col-md-4">
        <?= $form->field($model, 'id') ?>
        <?= $form->field($model, 'sku') ?>
        <?= $form->field($model, 'name') ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'category_id')->dropDownList(
            \forma\modules\product\records\Category::getList(),
            ['prompt' => '', 'class' => 'form-control']
        ) ?>
        <?= $form->field($model, 'manufacturer_id')->dropDownList(
            \forma\modules\product\records\Manufacturer::getList(),
            ['prompt' => '']
        ) ?>
        <?= $form->field($model, 'color_id') ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'note') ?>
        <?= $form->field($model, 'volume') ?>
        <?= $form->field($model, 'year_chart') ?>
    </div>

    <?php
    if (!empty($fieldAttributes)) {
        foreach ($fieldAttributes as $key => $fieldAttribute) {
//        $productValue = $productValues[$i++];
            echo SystemWidget::getByName($key, $fieldAttribute);
            echo '</br>';
        }
    }
    ?>

    <div class="form-group col-md-12">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
