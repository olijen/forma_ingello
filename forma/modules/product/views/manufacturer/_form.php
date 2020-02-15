<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Manufacturer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->request->isAjax) {
    Yii::$app->controller->layout = false;
    Pjax::begin();
} ?>

<div class="manufacturer-form">

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(\forma\modules\country\records\Country::getList(), [
        'prompt' => '',
    ]) ?>

    <div class="form-group">
        <?php if (Yii::$app->request->isAjax): ?>
            <?= \forma\components\widgets\ModalCreateButton::widget([
                'route' => Url::toRoute('/product/manufacturer/create'),
                'selectId' => 'product-manufacturer_id',
            ]) ?>
        <?php else: ?>
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php if (Yii::$app->request->isAjax) {
    Pjax::end();
} ?>
