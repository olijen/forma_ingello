<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\components\ActiveRecordHelper;
use forma\modules\country\records\Country;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\customer\records\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->request->isAjax): ?>
    <h2><?= $this->title ?></h2>
<?php endif; ?>

<div class="customer-form">

    <?php
        $formOptions = [
            'id' => 'customer-form',
        ];
        if (Yii::$app->request->isAjax) {
            $formOptions['options'] = [
                'class' => 'select-modal-form',
                'data-select' => '#selling-customer_id',
            ];
        }
        $form = ActiveForm::begin($formOptions);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя ЛПР') ?>

    <?= $form->field($model, 'firm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(ActiveRecordHelper::getList(Country::className()), [
        'prompt' => '',
    ]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'chief_phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'chief_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'site_company') ?>
    <?= $form->field($model, 'tax_rate')->textInput() ?>
    <div class="form-group" style="width: 150px">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => ['width' => '100%']]) ?>
        </div>
        <?php if (!$model->isNewRecord): ?>
            <div class="form-group">
                <?= Html::button('История диалога', ['class' => 'btn btn-success', 'id' => 'openDialog', 'style' => ['width' => '100%']]) ?>
            </div>
        <?php endIf ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
