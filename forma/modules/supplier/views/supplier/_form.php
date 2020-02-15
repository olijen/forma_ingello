<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\supplier\records\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->request->isAjax) {
    Yii::$app->controller->layout = false;
    Pjax::begin();
} ?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(\forma\modules\country\records\Country::getList(), [
        'prompt' => '',
    ]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_rate')->textInput() ?>

    <div class="form-group">
        <?php if (Yii::$app->request->isAjax): ?>
            <?= \forma\components\widgets\ModalCreateButton::widget([
                'route' => Url::toRoute('/supplier/supplier/create'),
                'selectId' => isset($_GET['target']) && $_GET['target'] == 'product' ?
                    'product-supplier_id' : 'purchase-supplier_id',
            ]) ?>
        <?php else: ?>
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php if (Yii::$app->request->isAjax) {
    Pjax::end();
} ?>
