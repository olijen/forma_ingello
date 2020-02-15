<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\components\ActiveRecordHelper;
use forma\modules\country\records\Country;

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

    <?= $form->field($model, 'country_id')->dropDownList(ActiveRecordHelper::getList(Country::className()), [
        'prompt' => '',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
