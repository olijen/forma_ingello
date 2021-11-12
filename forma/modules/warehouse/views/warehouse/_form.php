<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\components\ActiveRecordHelper;
use forma\modules\country\records\Country;
use kartik\range\RangeInput;

/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->request->isAjax): ?>
    <h2><?= $this->title ?></h2>
<?php endif; ?>

<div class="warehouse-form">

    <?php
    $formOptions = [
        'id' => 'customer-form',
    ];
    if (Yii::$app->request->isAjax) {
        $formOptions['options'] = [
            'class' => 'select-modal-form',
            'data-select' => '#selling-warehouse_id',
        ];
    }
    $form = ActiveForm::begin($formOptions);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?php if ($model->isNewRecord) {
        $model->capacity = 1000;
    } ?>
    <?= $form->field($model, 'capacity')->widget(RangeInput::classname(), [
        'options' => ['placeholder' => 'Вместимость (0 - 5)...'],
        'html5Container' => ['style' => 'width:350px'],
        'html5Options' => ['min' => 1, 'max' => 5000],
        'addon' => ['append' => ['content' => '<i class="fas fa-warehouse"></i>']]
    ]); ?>

    <?= $form->field($model, 'country_id')->dropDownList(ActiveRecordHelper::getList(Country::className()), [
        'prompt' => '',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
