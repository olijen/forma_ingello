 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\SellingProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="selling-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \forma\modules\product\records\Product::getList(),
        ['prompt' => '']
    )->label('Товар') ?>

    <?php if (Yii::$app->controller->action->id == 'create') : ?>

        <?= $form->field($model, 'selling_id')->hiddenInput(['value' => $sellingId])->label('') ?>

    <?php else : ?>

        <?= $form->field($model, 'selling_id')->dropDownList(
            \forma\modules\selling\records\Selling::getList(),
            ['prompt' => '']
        )->label('Продажа') ?>

    <?php endif ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'cost_type')->textInput() ?>

    <?= $form->field($model, 'pack_unit_id')->dropDownList(
        \forma\modules\product\records\PackUnit::getList(),
        ['prompt' => '']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
